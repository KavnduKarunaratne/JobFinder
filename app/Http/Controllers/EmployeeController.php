<?php

namespace App\Http\Controllers;
use App\Models\Bookmark;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.profile', [
            'user' => auth()->user()->id,
            'bookmarks' => Bookmark::get(),
            'listings' => Listing::get()
        ]);
    }

    public function edit(User $user) {
        return view('employee.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $user) {

        if($request->hasFile('cv')) {
            $formFields['cv'] = $request->file('cv')->store('cvs', 'public');
        }

        $edit = User::find($user);
        $edit->cv = $formFields['cv'];
        $edit->save();

        return redirect('/')->with('message', 'CV updated');

    }
}
