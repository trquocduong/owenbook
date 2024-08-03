<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::prefix('/')->controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home'); 
    Route::get('/products','products')->name('products'); 
    Route::get('/contact','contact')->name('contact');
    Route::get('/search','search')->name('search');
    Route::get('/detail_category','detail_category')->name('detail_category');
    Route::get('/detail_products','detail_products')->name('detail_products');
});
Route::prefix('/')->controller(AuthController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::get('/register','register')->name('register');
});
Route::prefix('/')->controller(CartController::class)->group(function(){
    Route::get('/heart','heart')->name('heart');
    Route::get('/cart','cart')->name('cart');
});
