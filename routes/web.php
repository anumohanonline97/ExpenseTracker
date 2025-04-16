<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
        return view('auth.login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');
Route::get('/signup', [AuthController::class, 'showRegisterForm'])
    ->name('signup');
Route::get('/reset_password', [AuthController::class, 'showResetForm'])
    ->name('reset_password');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
