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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@detail')->name('home-detail-categories');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop/{id}', 'ShopController@detail')->name('shop-detail-categories');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/categories', 'CategoryController@index')->name('category');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');
Route::get('/details/{id}', 'ProductDetailController@index')->name('product-detail');
Route::post('/details/{id}', 'ProductDetailController@add')->name('detail-add');
Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');


// Route::get('/register/success', 'Auth\RegisterController')->name('register-success');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart', 'CartController@index')->name('shop-cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('shop-cart-delete');
    Route::post('/checkout', 'CheckoutController@process')->name('checkout');
    
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
        Route::get('/dashboard/settings', 'DashboardSettings@store')->name('dashboard-settings-store');
        Route::post('/dashboard/account/{redirect}', 'DashboardSettings@update')->name('dashboard-settings-redirect');
        Route::get('/dashboard/transaction', 'DashboardTransactionController@index')->name('dashboard-transaction');
    });


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
