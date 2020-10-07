<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'AuthController@getLogin')->name('auth.getLogin');
Route::post('login', 'AuthController@postLogin')->name('auth.postLogin');
Route::get('logout', 'AuthController@logout')->name('auth.logout');

Route::get('register/owner', 'AuthController@getOwnerRegister')->name('auth.getOwnerRegister');
Route::post('register/owner', 'AuthController@postOwnerRegister')->name('auth.postOwnerRegister');
Route::get('register/user', 'AuthController@getUserRegister')->name('auth.getUserRegister');
Route::post('register/user', 'AuthController@postUserRegister')->name('auth.postUserRegister');

Route::get('admin/store/{id}', 'AdminController@storeDetail')->name('admin.storeDetail');
Route::post('admin/store/{id}', 'AdminController@confirmStore')->name('admin.confirmStore');
Route::get('admin/accepted', 'AdminController@accepted')->name('admin.acc');
Route::get('admin/rejected', 'AdminController@rejected')->name('admin.rej');

Route::get('owner/item/{id}', 'PemilikController@itemDetail')->name('owner.itemDetail');
Route::get('owner/orders', 'PemilikController@orders')->name('owner.orders');
Route::get('owner/order/{id}', 'PemilikController@order')->name('owner.order');
Route::post('owner/order/{id}', 'PemilikController@orderProcess')->name('owner.orderProcess');

Route::get('store/{id}', 'HomeController@storeDetail')->name('user.storeDetail');
Route::get('store/item/{id}', 'HomeController@itemDetail')->name('user.itemDetail');

Route::get('cart', 'TransaksiController@cartDetail')->name('cart.detail');
Route::post('cart', 'TransaksiController@cartAdd')->name('cart.add');
Route::post('checkout/{id}', 'TransaksiController@checkout')->name('cart.checkout');

Route::resource('user', 'UserController');
Route::resource('admin', 'AdminController');
Route::resource('item', 'BarangController');
Route::resource('owner', 'PemilikController');
Route::resource('transaction', 'TransaksiController');
Route::resource('details', 'TransaksiBarangController');
// Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
