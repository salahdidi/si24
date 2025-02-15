<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('addProduct', function () {
        Product::create([
            'name' => 'Product',
            'price' => 100,
            'quantity' => 10,
        ]);
    })->middleware('admin');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products/create', [ProductController::class, 'create']);
    Route::get('/products/read', [ProductController::class, 'read']);
    Route::get('/products/update', [ProductController::class, 'update']);
    Route::get('/products/delete', [ProductController::class, 'delete']);
    
});

require __DIR__.'/auth.php';
