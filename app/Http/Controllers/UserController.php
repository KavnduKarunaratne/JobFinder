<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create form
    public function create()
    {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'role' => 'required',
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        if($request->hasFile('cv')) {
            $formFields['cv'] = $request->file('cv')->store('cvs', 'public');
        }


        // Create User
        $user = User::create($formFields);

        // Login User
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');

    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            if (auth()->user()->role == '2') {
                return redirect('/admin')->with('message', 'You are now logged in');
            }else {
                return redirect('/')->with('message', 'You are now logged in');
            }
        }

        return back()->withErrors(['email' => 'Invalid
        Credentials'])->onlyInput('email');
    }
}
