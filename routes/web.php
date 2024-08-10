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
use App\Http\Controllers\FavouriteController;
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/profile/update', [UserController::class, 'update_profile'])->name('profile.update');
Route::get('/profile/order', [UserController::class, 'profile_order'])->name('profile.order');
Route::get('/profile/detail_order/{id}', [UserController::class, 'detail_order'])->name('profile.detail_order');
Route::get('/change_password', [UserController::class, 'change_password'])->name('change_password');
Route::post('/password/update', [UserController::class, 'update'])->name('password.update');
Route::prefix('/')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/products', 'products')->name('products');
    Route::post('/filter','fillter')->name('fillter');
    Route::post('/filterview','fillterview')->name('fillterview');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/search', 'search')->name('search');
    Route::get('/detail_category', 'detail_category')->name('detail_category');
    Route::get('/detail_products', 'detail_products')->name('detail_products');
});
Route::prefix('/')->controller(HomeController::class)->group(function () {
    Route::get('/detail/{id}', 'detail_product')->name('detail');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/search', 'search')->name('search');
    Route::get('/detail_category', 'detail_category')->name('detail_category');
    Route::get('/category/{category_id}', 'get_products_by_idcategory')->name('products.by.category');
});
Route::prefix('/')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('register-post', 'register_post')->name('register-post');
    Route::post('login-post', 'login_post')->name('login-post');
    Route::post('logout', 'logout')->name('logout');
});
Route::prefix('/')->controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/addtocart','addToCart');
    Route::post('/removecart','removeCart')->name('remove.cart'); //xóa
    Route::post('/removecart/header','removeCartheader')->name('remove.cart.header'); //xóa
    Route::post('/remove-all-cart','removeAllCart')->name('remove.all.cart');
});
Route::prefix('/')->controller(FavouriteController::class)->group(function () {
    Route::get('/heart', 'heart')->name('heart');
    Route::post('/addToFavorites','addToFavorites');
    Route::post('/removefavorites','removeFavarites')->name('removefavorites'); //xóa
    Route::post('/remove-all-favorites', 'removeAllFavarites')->name('remove.all.favorites');
});
//admin 
Route::prefix('/')->controller(AdminController::class)->group(function () {
    Route::get('/admin', 'admin')->name('admin');
});

Route::prefix('/')->controller(UserController::class)->group(function () {
    Route::get('admin/users', 'users')->name('admin/users');
    Route::post('admin/adduser', 'add')->name('admin/adduser');
    Route::get('admin/edituser/{id}', 'formedit')->name('admin/edituser');
    Route::post('admin/edituser/{id}', 'edit')->name('admin/edituser');
    Route::get('admin/removeuser/{id}', 'remove')->name('admin/removeuser');
});
Route::prefix('/')->controller(CategoryController::class)->group(function () {
    Route::get('admin/categories', 'categories')->name('admin/categories');
    Route::post('admin/addcategory', 'add')->name('admin/addcategory');
    Route::get('admin/editcategory/{id}', 'formedit')->name('admin/editcategory');
    Route::post('admin/editcategory/{id}', 'edit')->name('admin/editcategory');
    Route::get('admin/removecategory/{id}', 'remove')->name('admin/removecategory');
});
Route::prefix('/')->controller(ProductController::class)->group(function () {
    Route::get('admin/products', 'products')->name('admin/products');
    Route::get('admin/formaddproduct', 'formAddpro')->name('admin/formaddproduct');
    Route::post('admin/addproduct', 'create')->name('admin/addproduct');
    Route::get('admin/formeditproduct/{id}', 'formedit');
    Route::post('admin/editproduct/{id}', 'edit')->name('admin/editproduct');
    Route::get('admin/remove/{id}', 'remove')->name('remove');
});
Route::prefix('/')->controller(VoucherController::class)->group(function () {
    Route::get('admin/vouchers', 'vouchers')->name('admin/vouchers');
    Route::post('admin/addvoucher', 'add')->name('admin/addvouchers');
    Route::get('admin/editvoucher/{id}', 'formedit')->name('admin/editvouchers');
    Route::post('admin/editvoucher/{id}', 'edit')->name('admin/editvouchers');
    Route::get('admin/removevoucher/{id}', 'remove')->name('admin/removevoucher');
});
Route::prefix('/')->controller(InventoryController::class)->group(function () {
    Route::get('/inventory', 'getInventory')->name('inventory');
    Route::get('/import_pro/{id}', 'importInventory')->name('import_pro');
    Route::put('/import_pro/import/{id}', 'import_Inventory')->name('import.product');
});
Route::prefix('/')->controller(BillsController::class)->group(function () {
    Route::get('/bill_index', 'bill_index')->name('bill_index');
    Route::post('/bills/{id}/approve', 'approve')->name('bills.approve');
    Route::delete('/bills/{id}/cancel', 'cancel')->name('bills.cancel'); // huỷ đơn
    Route::delete('/bills/{id}', 'destroy')->name('bills.destroy'); //xoá
});