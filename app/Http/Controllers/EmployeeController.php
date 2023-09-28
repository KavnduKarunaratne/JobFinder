<?php

namespace App\Http\Controllers;
use App\Models\Bookmark;
use App\Models\Listing;
use App\Models\User;


class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.profile', [
            'bookmarks' => Bookmark::get(),
            'listings' => Listing::get()
        ]);
    }
}
