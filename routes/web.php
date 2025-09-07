<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// API routes for products (UMKM)
// Auth endpoints tetap tersedia di web untuk sesi sanctum berbasis cookie
Route::prefix('api')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
});

// SPA catch-all
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
