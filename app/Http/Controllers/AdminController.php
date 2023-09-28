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

        $totalUsers = User::count();
        $totalJobs = Listing::count();
        $totalBookmarks = Bookmark::count();

        $totalBusiness = User::where('role', '0')->count();
        $totalEmployer = User::where('role', '1')->count();
        $totalAdmin = User::where('role', '2')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalJobsToday = Listing::whereDate('created_at', $todayDate)->count();
        $totalJobsThisMonth = Listing::whereMonth('created_at', $thisMonth)->count();
        $totalJobsThisYear = Listing::whereYear('created_at', $thisYear)->count();


        $mostBookmarked = Bookmark::select('listing_id')
            ->groupBy('listing_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();
        $mostBookmarkedJob = Listing::find($mostBookmarked[0]['listing_id']);

        return view('admin.dashboard', [
            'users' => User::all(),
        ], compact('totalUsers', 'totalJobs', 'totalBookmarks', 'totalBusiness', 'totalEmployer',
            'totalAdmin', 'totalJobsToday', 'totalJobsThisMonth', 'totalJobsThisYear', 'mostBookmarked', 'mostBookmarkedJob'));

    }

    public function analytics() {
        $totalUsers = User::count();
        $totalJobs = Listing::count();
        $totalBookmarks = Bookmark::count();

        $totalBusiness = User::where('role', '0')->count();
        $totalEmployer = User::where('role', '1')->count();
        $totalAdmin = User::where('role', '2')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalJobsToday = Listing::whereDate('created_at', $todayDate)->count();
        $totalJobsThisMonth = Listing::whereMonth('created_at', $thisMonth)->count();
        $totalJobsThisYear = Listing::whereYear('created_at', $thisYear)->count();

        $mostBookmarked = Bookmark::select('listing_id')
            ->groupBy('listing_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();
        $mostBookmarkedJob = Listing::find($mostBookmarked[0]['listing_id']);


        return view('admin.analytics', compact('totalUsers', 'totalJobs', 'totalBookmarks', 'totalBusiness', 'totalEmployer',
            'totalAdmin', 'totalJobsToday', 'totalJobsThisMonth', 'totalJobsThisYear', 'mostBookmarked', 'mostBookmarkedJob'));
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
