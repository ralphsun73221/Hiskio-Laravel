<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/', [ProductController::class, 'create']);
Route::resource('products', ProductController::class);
Route::resource('carts', CartController::class);
Route::resource('cart_items', CartItemController::class);