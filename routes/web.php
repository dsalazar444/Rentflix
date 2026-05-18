<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    // Admin movie routes
    Route::get('/admin/movie', 'App\Http\Controllers\Admin\MovieManagmentController@index')->name('admin.movie.index');
    Route::post('/admin/movie/save', 'App\Http\Controllers\Admin\MovieManagmentController@save')->name('admin.movie.save');
    Route::delete('/admin/movie/delete/{id}', 'App\Http\Controllers\Admin\MovieManagmentController@delete')->name('admin.movie.delete');
    Route::put('/admin/movie/update/{id}', 'App\Http\Controllers\Admin\MovieManagmentController@update')->name('admin.movie.update');
    Route::get('/admin/movie/create', 'App\Http\Controllers\Admin\MovieManagmentController@create')->name('admin.movie.create');
    Route::match(['get', 'post'], '/admin/movie/searchMovieExternalApi', 'App\Http\Controllers\Admin\MovieManagmentController@getMovieDataFromExternalApi')->name('admin.movie.searchMovieExternalApi');

    // Admin bill routes
    Route::get('/admin/bill', 'App\Http\Controllers\BillController@index')->name('admin.bill.index');
    Route::delete('/admin/bill/delete/{id}', 'App\Http\Controllers\BillController@delete')->name('admin.bill.delete');
    Route::put('/admin/bill/update/{id}', 'App\Http\Controllers\BillController@update')->name('admin.bill.update');
    Route::post('/admin/bill/save', 'App\Http\Controllers\BillController@save')->name('admin.bill.save');
});

// Movie routes
Route::get('/', 'App\Http\Controllers\MovieController@index')->name('movie.index');
Route::get('/movie/{id}', 'App\Http\Controllers\MovieController@show')->name('movie.show');
Route::get('/movie', 'App\Http\Controllers\MovieController@searchMovieByName')->name('movie.search');

// User routes
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::post('/users', 'App\Http\Controllers\UserController@create')->name('user.create');

// Library routes
Route::get('/library', 'App\Http\Controllers\LibraryItemController@index')->name('library.index');

// Authentication routes
Route::get('/auth', 'App\Http\Controllers\AuthController@index')->name('auth.index');
Route::post('/auth/register', 'App\Http\Controllers\AuthController@create')->name('auth.create');
Route::post('/auth/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
Route::post('/auth/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

// Bill routes
Route::get('/bill/list', 'App\Http\Controllers\BillController@listBills')->name('bill.list');
Route::get('/bills/download/{id}', 'App\Http\Controllers\BillController@download')->name('bill.download');
Route::get('/bills/send/{id}', 'App\Http\Controllers\BillController@send')->name('bill.send');

// Wishlist routes
Route::post('/catalog/wishlist/add/{id}', 'App\Http\Controllers\WishlistItemController@add')->name('wishlist.add');
Route::delete('/catalog/wishlist/delete/{id}', 'App\Http\Controllers\WishlistItemController@delete')->name('wishlist.delete');
Route::get('/wishlist', 'App\Http\Controllers\WishlistItemController@index')->name('wishlist.index');

// Shopping cart routes
Route::post('/cart/add/{id}', 'App\Http\Controllers\ShoppingCartController@add')->name('cart.add');
Route::delete('/cart/remove/{id}', 'App\Http\Controllers\ShoppingCartController@remove')->name('cart.remove');
Route::get('/cart/clean', 'App\Http\Controllers\ShoppingCartController@clean')->name('cart.clean');
Route::post('/cart/process', 'App\Http\Controllers\BillController@processPayment')->name('cart.process');
