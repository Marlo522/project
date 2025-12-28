<?php
// filepath: c:\xampp\htdocs\projects\project\project\routes\web.php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;




Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login routes
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Logout route
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// Home route (protected)
Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/users', [UserController::class, 'index'])
    ->middleware('auth')
    ->name('users.index');