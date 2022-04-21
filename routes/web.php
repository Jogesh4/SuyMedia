<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('welcome');
Route::get('/package/{id}', 'App\Http\Controllers\HomeController@view_package')->name('view_package');


Route::view('/adminlogin', 'admin/adminlogin')->name('adminlogin');
Route::post('/adminauth', 'App\Http\Controllers\Admin\DashboardController@adminauth')->name('adminauth');
Route::get('/admin-dashboard','App\Http\Controllers\Admin\DashboardController@dashboard')->name('admin-dashboard');
Route::get('/adminlogout','App\Http\Controllers\Admin\DashboardController@adminlogout')->name('adminlogout');
Route::get('/manage-order','App\Http\Controllers\Admin\OrderController@index')->name('manage-order');
Route::get('/admin_order_detail/{id}', 'App\Http\Controllers\Admin\OrderController@order_detail')->name('admin_order_detail');


Route::view('/login','login');
Route::view('/sign-up','sign-up');
Route::post('/login', 'App\Http\Controllers\HomeController@login')->name('login');
Route::post('/signup', 'App\Http\Controllers\HomeController@signup')->name('signup');
Route::get('/logout','App\Http\Controllers\HomeController@logout')->name('logout');
Route::view('/forget-password','forget-password');
Route::view('/pricing','pricing');

Route::resource('/categories', 'App\Http\Controllers\Admin\CategoryController');
Route::resource('/packages', 'App\Http\Controllers\Admin\PackageController');
Route::resource('/users', 'App\Http\Controllers\Admin\UserController');

Route::get('/change_status/{type}/{id}/{status}', 'App\Http\Controllers\Admin\CategoryController@change_status')->name('change_status');


Route::get('/user-dashboard', [UserController::class, 'dashboard'])->name('user-dashboard');
Route::get('/user_order_list', [UserController::class, 'order_list'])->name('user_order_list');
Route::get('/user_order_detail/{id}', [UserController::class, 'order_detail'])->name('user_order_detail');
Route::get('/user_last_order', [UserController::class, 'last_order'])->name('user_last_order');
Route::get('/user_cart', [UserController::class, 'cart'])->name('user_cart');
Route::get('/user_profile', [UserController::class, 'profile'])->name('user_profile');
Route::get('/favorite_item', [UserController::class, 'favorite'])->name('favorite_item');

Route::view('/account','user.account');
Route::view('/account-notification','user.account-notification');
Route::view('/account-connection','user.account-connection');




Route::view('/add-product','admin.add-product');
Route::view('/create-package','admin.create-package');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('add-to-cart', [CartController::class, 'add_to_cart'])->name('add.to.cart');
Route::post('remove-from-cart', [CartController::class, 'remove_from_cart'])->name('remove.from.cart');
Route::post('remove-item-from-cart', [CartController::class, 'remove_item_from_cart'])->name('remove.item.from.cart');
Route::get('add_cart_quantity', [CartController::class, 'add_cart_quantity'])->name('add_cart_quantity');
Route::get('minus_cart_quantity', [CartController::class, 'minus_cart_quantity'])->name('minus_cart_quantity');

Route::get('/place', [OrderController::class, 'place'])->name('order.place');
Route::post('/update-order-status', [OrderController::class, 'update_order_status'])->name('update_order_status');


Route::view('/item','items.view-item');
Route::view('/check-out','items.check-out');