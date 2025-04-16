<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/passwordreset', [AuthController::class, 'passwordreset']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);
