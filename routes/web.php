<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
// Public route
Route::view('/', 'welcome');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    // Logout route (POST)
   Route::post('/logout', function () {
    Auth::logout();                     // log out the user
    request()->session()->invalidate(); // invalidate session
    request()->session()->regenerateToken(); // prevent CSRF issues
    return redirect('/');               // redirect to home page
})->name('logout');
});

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

     Route::resource('users', UserController::class);
});

// Include Breeze / Jetstream auth routes (if you have them)
require __DIR__.'/auth.php';
