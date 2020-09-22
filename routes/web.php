<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@allProducts')->name('shop');

Route::get('/login/admin', 'Auth\LoginController@gotoAdminLoginForm');
Route::get('/login/store', 'Auth\LoginController@gotoStoreLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@gotoAdminRegisterForm');
Route::get('/register/store', 'Auth\RegisterController@gotoStoreRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/store', 'Auth\LoginController@storeLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/store', 'Auth\RegisterController@createStore')->name('register.store');

//Route::view('/home', 'home')->middleware('auth');
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::redirect('', '/admin/category', 301)->name('admin.home');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');
    Route::resource('prodparameter', 'ProductParameterController');
});

Route::group(['middleware' => 'auth:store', 'prefix' => 'store'], function () {
    Route::redirect('', '/store/products', 301)->name('store.home');
    Route::resource('products', 'ProductController');
    Route::get('orders/customer/{id}', 'OrderManagementController@customerOrders')->name('orders.customer');
    Route::resource('orders', 'OrderManagementController');
});


Route::post('/clear', 'CartController@clear')->name('cart.clear');
Route::resource('cart', 'CartController');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('checkout', 'CheckoutController');
    Route::post('/order/place', 'OrderController@saveOrder')->name('order.place');
    Route::get('/order/complete', 'OrderController@orderComplete')->name('order.complete');
});
