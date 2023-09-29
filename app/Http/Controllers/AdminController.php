<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'users' => User::all(),
        ]);
    }

    public function analytics() {
        $totalUsers = User::count();
        $totalJobs = Listing::count();
        $totalBookmarks = Bookmark::count();

        $totalBusiness = User::where('role', '0')->count();
        $totalEmployer = User::where('role', '1')->count();
        $totalAdmin = User::where('role', '2')->count();

        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $thisJan = Carbon::now()->format('01');
        $thisFeb = Carbon::now()->format('02');
        $thisMar = Carbon::now()->format('03');
        $thisApr = Carbon::now()->format('04');
        $thisMay = Carbon::now()->format('05');
        $thisJun = Carbon::now()->format('06');
        $thisJul = Carbon::now()->format('07');
        $thisAug = Carbon::now()->format('08');
        $thisSep = Carbon::now()->format('09');
        $thisOct = Carbon::now()->format('10');
        $thisNov = Carbon::now()->format('11');
        $thisDec = Carbon::now()->format('12');

        $totalJobsToday = Listing::whereDate('created_at', $todayDate)->count();
        $totalJobsThisMonth = Listing::whereMonth('created_at', $thisMonth)->count();

        $totalJobJan = Listing::whereMonth('created_at', $thisJan)->count();
        $totalJobFeb = Listing::whereMonth('created_at', $thisFeb)->count();
        $totalJobMar = Listing::whereMonth('created_at', $thisMar)->count();
        $totalJobApr = Listing::whereMonth('created_at', $thisApr)->count();
        $totalJobMay = Listing::whereMonth('created_at', $thisMay)->count();
        $totalJobJun = Listing::whereMonth('created_at', $thisJun)->count();
        $totalJobJul = Listing::whereMonth('created_at', $thisJul)->count();
        $totalJobAug = Listing::whereMonth('created_at', $thisAug)->count();
        $totalJobSep = Listing::whereMonth('created_at', $thisSep)->count();
        $totalJobOct = Listing::whereMonth('created_at', $thisOct)->count();
        $totalJobNov = Listing::whereMonth('created_at', $thisNov)->count();
        $totalJobDec = Listing::whereMonth('created_at', $thisDec)->count();

        $totalJobsThisYear = Listing::whereYear('created_at', $thisYear)->count();

        $mostBookmarked = Bookmark::select('listing_id')
            ->groupBy('listing_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(3)
            ->get();

        $oneBookmarkedJob = Listing::find($mostBookmarked[0]['listing_id']);
        $twoBookmarkedJob = Listing::find($mostBookmarked[1]['listing_id']);
        $threeBookmarkedJob = Listing::find($mostBookmarked[2]['listing_id']);

        $oneBookmarkedCount = Bookmark::where('listing_id', $mostBookmarked[0]['listing_id'])->count();
        $twoBookmarkedCount = Bookmark::where('listing_id', $mostBookmarked[1]['listing_id'])->count();
        $threeBookmarkedCount = Bookmark::where('listing_id', $mostBookmarked[2]['listing_id'])->count();


        return view('admin.analytics', compact('totalUsers', 'totalJobs', 'totalBookmarks', 'totalBusiness', 'totalEmployer',
            'totalAdmin', 'totalJobsToday', 'totalJobsThisMonth', 'totalJobsThisYear', 'mostBookmarked',
            'oneBookmarkedJob', 'twoBookmarkedJob', 'threeBookmarkedJob',
            'totalJobJan', 'totalJobFeb', 'totalJobMar', 'totalJobApr', 'totalJobMay', 'totalJobJun',
            'totalJobJul', 'totalJobAug', 'totalJobSep', 'totalJobOct', 'totalJobNov', 'totalJobDec',
            'oneBookmarkedCount', 'twoBookmarkedCount', 'threeBookmarkedCount'));
    }

    // Show create form
    public function create() {
        return view('admin.create');
    }

    // Store new admin data
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Set Role
        $formFields['role'] = '2';

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create Admin
        User::create($formFields);

        return redirect('/admin')->with('message', 'User created and logged in');

    }

    //Show Edit form
    public function edit(User $user) {
//        dd($user);
        return view('admin.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $user) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
        ]);

        $edit = User::find($user);
        $edit->name = $formFields['name'];
        $edit->save();

        return redirect('/admin')->with('message', 'User updated');

    }

    public function destroy($user) {
        $delete = User::find($user);

        $delete->delete();
        return redirect('/admin')->with('message', 'User deleted');
    }
}
