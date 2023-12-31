<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MailController;
use App\Models\Listing;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Admin Section
Route::prefix('admin')->middleware(['auth', 'role'])->group(function() {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/analytics', [AdminController::class, 'analytics']);
    Route::get('/register', [AdminController::class, 'create']);
    Route::post('/users', [AdminController::class, 'store']);
    Route::get('/users/{user}/edit', [AdminController::class, 'edit']);
    Route::put('/users/{user}', [AdminController::class, 'update']);
    Route::delete('/delete/{user}', [AdminController::class, 'destroy']);
});

//Employer Section
Route::prefix('employer')->middleware(['auth', 'employer'])->group(function() {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/{user}/edit', [EmployeeController::class, 'edit']);
    Route::put('/{user}', [EmployeeController::class, 'update']);
});

// All Listing

Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listings/create', [ListingController::class,
'create'])->middleware('auth');

// Store listing data
Route::post('/listings', [ListingController::class,
'store'])->middleware('auth');

//Show Edit form
Route::get('/listings/{listing}/edit', [ListingController::class,
'edit'])->middleware('auth');

//Update listing
Route::put('/listings/{listing}',[ListingController::class,
'update'])->middleware('auth');

//Delete listing
Route::delete('/listings/{listing}',[ListingController::class,
'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class,
'manage'])->middleware('auth');

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Bookmark Listing
Route::post('/bookmark', [ListingController::class, 'bookmark'])->middleware('auth');

// Unbookmark Listing
Route::delete('/bookmark/{bookmark}', [ListingController::class, 'unbookmark'])->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class,
'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class,
'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class,
'login'])->name('login')->middleware('guest');

// Mail Company
Route::get('/{email}', [MailController::class, 'mail'])->middleware('employer');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

