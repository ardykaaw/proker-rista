<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// CSRF cookie endpoint will be served by Sanctum automatically at /sanctum/csrf-cookie

// Public product endpoints (read)
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Protected product endpoints (write)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/products/{product}', [ProductController::class, 'update']); // accept multipart without method override
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
});


