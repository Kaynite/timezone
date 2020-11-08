<?php

use App\Models\Product;
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
Route::get('shop', 'ProductsController@shop')->name('shop');
Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('blog/{id}/{slug}', 'PostsController@show')->name('post.show');
Route::post('comment', 'CommentsController@store')->name('comments.store');

Route::get('cart', 'CartController@index')->name('cart.index');
Route::put('cart/{id}/update', 'CartController@update')->name('cart.update');
Route::post('cart/{id}', 'CartController@store')->name('cart.store');

Route::get('checkout', 'CartController@checkout')->name('checkout')->middleware('auth');
Route::post('checkout', 'CartController@charge');
Route::get('guest-checkout', 'CartController@guestCheckout')->name('checkout.guest');
Route::get('thankyou', 'CartController@thankyou')->name('thankyou');

Route::get('profile', function () {})->name('profile');

Route::post('product/{id}/review', 'ReviewsController@store')->name('review.store');
Route::get('product/{id}/{slug}', 'ProductsController@show')->name('product.show');
Route::get('category/{id}/{slug}', 'CategoriesController@show')->name('category.show');

Route::get('test', function () {
    $product = Product::with('images')->find(7);
    $product->images->each(function($image) {
        $image->delete();
    });
    return $product->images;
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('makeslug', 'ProductsController@makeSlug')->name('products.makeslug');
    Route::get('make-category-slug', 'CategoriesController@makeSlug')->name('categories.makeslug');
    Route::get('make-post-slug', 'PostsController@makeSlug')->name('posts.makeslug');
});
