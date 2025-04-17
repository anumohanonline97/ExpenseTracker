<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/passwordreset', [AuthController::class, 'passwordreset']);

    //Categories API routes
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    //Expenses API routes
    Route::post('/expenses', [ExpenseController::class, 'store']);
    Route::get('/expenses', [ExpenseController::class, 'index']);
    //Chart
    Route::get('/expenses/analytics', [ExpenseController::class, 'analytics']);
    //Expense Filter
    Route::get('/expenses/filter', [ExpenseController::class, 'filter']);
    Route::put('/expenses/{id}', [ExpenseController::class, 'update']);
    Route::get('/expenses/{id}', [ExpenseController::class, 'show']);
    Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy']);

});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);
