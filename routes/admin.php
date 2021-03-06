<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use phpDocumentor\Reflection\Types\Resource_;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => 'admin'], function () {

        // Authentication Routes
        Route::group(['namespace' => 'AdminAuth'], function () {
            Route::get('login', 'AdminLoginController@showLoginForm')->name('admin.login');
            Route::post('login', 'AdminLoginController@login');
            Route::post('logout', 'AdminLoginController@logout')->name('admin.logout');

            Route::get('register', 'AdminRegisterController@showRegistrationForm')->name('admin.register');
            Route::post('register', 'AdminRegisterController@register');

            Route::get('password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
            Route::post('password/reset', 'AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        });

        Route::group(['middleware' => 'admin:admin'], function () {

            Route::get('/', 'HomeController@dashboard')->name('admin.home');

            Route::resource('admins', 'AdminController');
            Route::post('admins/multipledelete', 'AdminController@multipleDelete')->name('admins.multipleDelete');

            Route::resource('users', 'UsersController');
            Route::post('users/multipledelete', 'UsersController@multipleDelete')->name('users.multipleDelete');

            Route::resource('countries', 'CountriesController');
            Route::post('countries/multipledelete', 'CountriesController@multipleDelete')->name('countries.multipleDelete');

            Route::resource('cities', 'CitiesController');
            Route::post('cities/multipledelete', 'CitiesController@multipleDelete')->name('cities.multipleDelete');

            Route::resource('states', 'StatesController');
            Route::post('states/multipledelete', 'StatesController@multipleDelete')->name('states.multipleDelete');

            Route::resource('categories', 'CategoriesController');
            Route::post('categories/multipledelete', 'CategoriesController@multipleDelete')->name('categories.multipleDelete');
            Route::get('test-categories', 'CategoriesController@test')->name('treeJson');

            Route::resource('trademarks', 'TrademarksController');
            Route::post('trademarks/multipledelete', 'TrademarksController@multipleDelete')->name('trademarks.multipleDelete');

            Route::resource('manufacturers', 'ManufacturersController');
            Route::post('manufacturers/multipledelete', 'ManufacturersController@multipleDelete')->name('manufacturers.multipleDelete');

            Route::resource('shipping', 'ShippingController');
            Route::post('shipping/multipledelete', 'ShippingController@multipleDelete')->name('shipping.multipleDelete');

            Route::resource('malls', 'MallsController');
            Route::post('malls/multipledelete', 'MallsController@multipleDelete')->name('malls.multipleDelete');

            Route::resource('colors', 'ColorsController');
            Route::post('colors/multipledelete', 'ColorsController@multipleDelete')->name('colors.multipleDelete');

            Route::resource('sizes', 'SizesController');
            Route::post('sizes/multipledelete', 'SizesController@multipleDelete')->name('sizes.multipleDelete');

            Route::resource('weight', 'WeightController');
            Route::post('weight/multipledelete', 'WeightController@multipleDelete')->name('weight.multipleDelete');

            Route::resource('orders', 'OrdersController');
            Route::post('orders/multipledelete', 'OrdersController@multipleDelete')->name('orders.multipleDelete');

            Route::post('posts/uploadImages', 'PostsController@imagesUpload')->name('posts.uploadImages');
            Route::resource('posts', 'postsController');
            Route::post('posts/multipledelete', 'PostsController@multipleDelete')->name('posts.multipleDelete');

            Route::get('products/trash', 'ProductsController@trash')->name('products.trash');
            Route::resource('products', 'ProductsController');
            Route::post('products/multipledelete', 'ProductsController@multipleDelete')->name('products.multipleDelete');
            Route::post('products/{id}/copy', 'ProductsController@copy')->name('products.copy');
            Route::post('products/{id}/restore', 'ProductsController@restore')->name('products.restore');
            Route::post('products/{id}/force-delete', 'ProductsController@forceDelete')->name('products.forceDelete');

            Route::resource('comments', 'CommentsController')->only(['index', 'destroy']);
            Route::post('comments/multipledelete', 'CommentsController@multipleDelete')->name('comments.multipleDelete');

            /*
            Route::group(['prefix' => 'products'], function () {
                Route::get('/', 'ProductsController@approved')->name('products.index');
                Route::get('pending', 'ProductsController@pending')->name('products.pending');
                Route::get('rejected', 'ProductsController@rejected')->name('products.rejected');
                Route::get('trash', 'ProductsController@trash')->name('products.trash');
                Route::get('{id}/edit', 'ProductsController@edit')->name('products.edit');
            });
            */
            // Route::resource('userstypes', 'UsersTypesController');

            // Settings Routes
            Route::get('settings', 'SettingsController@settings')->name('admin.settings');
            Route::post('settings', 'SettingsController@update');
        });
    });

});
