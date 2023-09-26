<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if(Auth::user()->role == '0') {
                return $next($request);
            }else {
                return redirect('/')->with('message', 'You are not authorized to access this page');
            }
        }else {
            return redirect('/login')->with('message', 'Please Login to access this page');
        }
    }
}