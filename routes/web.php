<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// API routes for products (UMKM)
Route::prefix('api')->group(function () {
    // Handle CORS preflight requests
    Route::options('/{any}', function () {
        return response('', 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-CSRF-TOKEN');
    })->where('any', '.*');
    
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
    // Always use CDN version since build fails on Hostinger
    return view('app-cdn');
});

// Fallback route for when assets are not loaded
Route::get('/fallback', function () {
    return view('fallback');
});

// CDN version route
Route::get('/cdn', function () {
    return view('app-cdn');
});

// Test API endpoint
Route::get('/test-api', function () {
    try {
        $products = \App\Models\Product::orderByDesc('created_at')->get();
        return response()->json([
            'status' => 'success',
            'count' => $products->count(),
            'products' => $products
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});

// SPA catch-all - semua route lainnya akan menampilkan Vue app
Route::get('/{any}', function () {
    // Always use CDN version since build fails on Hostinger
    return view('app-cdn');
})->where('any', '.*');
