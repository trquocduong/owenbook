<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BillsController;

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
Route::prefix('/')->controller(AdminController::class)->group(function(){
    Route::get('/admin','admin')->name('admin');
});

Route::prefix('/')->controller(UserController::class)->group(function(){
    Route::get('admin/users', 'users')->name('admin/users');
    Route::post('admin/adduser', 'add')->name('admin/adduser');
    Route::get('admin/edituser/{id}', 'formedit')->name('admin/edituser');
    Route::post('admin/edituser/{id}','edit')->name('admin/edituser');
    Route::get('admin/removeuser/{id}', 'remove')->name('admin/removeuser');
});
Route::prefix('/')->controller(CategoryController::class)->group(function(){
    Route::get('admin/categories','categories')->name('admin/categories');
    Route::post('admin/addcategory','add')->name('admin/addcategory');
    Route::get('admin/editcategory/{id}','formedit')->name('admin/editcategory');
    Route::post('admin/editcategory/{id}','edit')->name('admin/editcategory');
    Route::get('admin/removecategory/{id}','remove')->name('admin/removecategory');
});
Route::prefix('/')->controller(ProductController::class)->group(function(){
    Route::get('admin/products','products')->name('admin/products');
    Route::get('admin/formaddproduct','formAddpro')->name('admin/formaddproduct');
    Route::post('admin/addproduct','create')->name('admin/addproduct');
    Route::get('admin/formeditproduct/{id}', 'formedit');
    Route::post('admin/editproduct/{id}','edit')->name('admin/editproduct');
    Route::get('admin/remove/{id}','remove')->name('remove');
});
Route::prefix('/')->controller(VoucherController::class)->group(function(){
    Route::get('admin/vouchers','vouchers')->name('admin/vouchers');
    Route::post('admin/addvoucher','add')->name('admin/addvouchers');
    Route::get('admin/editvoucher/{id}','formedit')->name('admin/editvouchers');
    Route::post('admin/editvoucher/{id}','edit')->name('admin/editvouchers');
    Route::get('admin/removevoucher/{id}','remove')->name('admin/removevoucher');
});
Route::prefix('/')->controller(InventoryController::class)->group(function(){
    Route::get('/inventory', 'getInventory')->name('inventory');
    Route::get('/import_pro/{id}','importInventory')->name('import_pro');
    Route::put('/import_pro/import/{id}','import_Inventory')->name('import.product');
});
Route::prefix('/')->controller(BillsController::class)->group(function(){
    Route::get('/bill_index', 'bill_index')->name('bill_index');
    Route::post('/bills/{id}/approve', 'approve')->name('bills.approve');
    Route::delete('/bills/{id}/cancel', 'cancel')->name('bills.cancel');// huỷ đơn
    Route::delete('/bills/{id}', 'destroy')->name('bills.destroy');//xoá


});
