<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::namespace('Auth\Api')->prefix('v1')->group(function() {
    Route::post('login', 'LoginController@login')->name('api.v1.login');
    Route::delete('logout', 'LogoutController@logout')->name('api.v1.logout');
});

Route::namespace('Api')->prefix('v1')->group(function () {
    Route::resource('user', 'UserController')->except(['create', 'edit']);
    Route::resource('category', 'CategoryController')->except(['create', 'edit']);
    Route::resource('product', 'ProductController')->except(['create', 'edit']);
    Route::resource('order', 'OrderController')->except(['create', 'edit', 'show']);
    Route::resource('shipping', 'ShippingController')->except(['create', 'edit', 'show']);

});
