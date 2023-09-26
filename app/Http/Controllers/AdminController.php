<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
//        dd(User::all());
        return view('admin.dashboard');

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
}
