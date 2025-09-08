<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// API routes for products (UMKM)
Route::prefix('api')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store'])->middleware('auth:sanctum');
    Route::put('/products/{id}', [ProductController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('auth:sanctum');
    
    // Auth endpoints
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
});

// Root route - serve Vue app
Route::get('/', function () {
    // Check if build assets exist
    if (file_exists(public_path('build/manifest.json'))) {
        return view('app');
    } else {
        // Fallback to CDN version if build assets don't exist
        return view('app-cdn');
    }
});

// Fallback route for when assets are not loaded
Route::get('/fallback', function () {
    return view('fallback');
});

// CDN version route
Route::get('/cdn', function () {
    return view('app-cdn');
});

// SPA catch-all - semua route lainnya akan menampilkan Vue app
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
