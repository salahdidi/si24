<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



    Route::post('/products', [ProductController::class, 'create']);
    Route::get('/products', [ProductController::class, 'read']);
    Route::put('/products', [ProductController::class, 'update']);
    Route::delete('/products', [ProductController::class, 'delete']);
