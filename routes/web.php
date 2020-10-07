<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@home')->name('home');

Route::get('cart', 'CartController@index')->name('cart.index');
Route::put('cart/{id}/update', 'CartController@update')->name('cart.update');
Route::post('cart/{id}', 'CartController@store')->name('cart.store');

Route::get('product/{id}', 'ProductsController@show')->name('product.show');
Route::get('category/{id}', 'CategoriesController@show')->name('category.show');