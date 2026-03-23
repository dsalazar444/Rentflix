<?php

use App\Mail\InvoiceMail;
use App\Models\Bill;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/test-mail', function () {
    $bill = Bill::with(['user', 'items.movie'])->find(1);

    Mail::to($bill->user->email)->send(new InvoiceMail($bill));

    return 'Correo enviado!';
});

// Admin routes
Route::get('/admin/movie', 'App\Http\Controllers\MovieController@index')->name('admin.movie.index');
Route::post('/admin/movie/save', 'App\Http\Controllers\MovieController@save')->name('admin.movie.save');
Route::delete('/admin/movie/delete/{id}', 'App\Http\Controllers\MovieController@delete')->name('admin.movie.delete');
Route::put('/admin/movie/update/{id}', 'App\Http\Controllers\MovieController@update')->name('admin.movie.update');
Route::get('/admin/bill', 'App\Http\Controllers\BillController@index')->name('admin.bill.index');

// Catalog routes
Route::get('/', 'App\Http\Controllers\CatalogController@index')->name('catalog.index');
Route::get('/catalog/movie/{id}', 'App\Http\Controllers\CatalogController@show')->name('catalog.show');

// User routes
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::post('/users', 'App\Http\Controllers\UserController@create')->name('user.create');

// Collection routes
Route::get('/collections/library', 'App\Http\Controllers\LibraryItemController@index')->name('collections.library');
Route::get('/collections/wishlist', 'App\Http\Controllers\WishlistItemController@index')->name('collections.wishlist');

// Authentication routes
Route::get('/auth', 'App\Http\Controllers\AuthController@index')->name('auth.index');
Route::post('/auth/register', 'App\Http\Controllers\AuthController@create')->name('auth.create');
Route::post('/auth/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
Route::get('/auth/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

// Admin bill routes
Route::get('/admin/bill', 'App\Http\Controllers\BillController@index')->name('admin.bill.index');
Route::delete('/admin/bill/delete/{id}', 'App\Http\Controllers\BillController@delete')->name('admin.bill.delete');
Route::put('/admin/bill/update/{id}', 'App\Http\Controllers\BillController@update')->name('admin.bill.update');
Route::post('/admin/bill/save', 'App\Http\Controllers\BillController@save')->name('admin.bill.save');

// Wishlist routes
Route::get('/collections/wishlist', 'App\Http\Controllers\WishlistItemController@index')->name('collections.wishlist');
Route::post('/catalog/wishlist/add/{id}', 'App\Http\Controllers\WishlistItemController@add')->name('collections.wishlist.add');
Route::delete('/catalog/wishlist/delete/{id}', 'App\Http\Controllers\WishlistItemController@delete')->name('collections.wishlist.delete');

// Library routes
Route::get('/collections/library', 'App\Http\Controllers\LibraryItemController@index')->name('collections.library');

// Shopping cart routes
Route::post('/cart/add/{id}', 'App\Http\Controllers\ShoppingCartController@add')->name('cart.add');
Route::delete('/cart/remove/{id}', 'App\Http\Controllers\ShoppingCartController@remove')->name('cart.remove');
Route::get('/cart/clean', 'App\Http\Controllers\ShoppingCartController@clean')->name('cart.clean');
Route::post('/cart/process', 'App\Http\Controllers\BillController@processPayment')->name('cart.process');

// Movie routes
Route::get('/movie', 'App\Http\Controllers\MovieController@search')->name('movie.search');
