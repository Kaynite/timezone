<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

            Route::view('/', 'adminlte.page')->name('admin.home');

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

            Route::resource('userstypes', 'UsersTypesController');

            // Settings Routes
            Route::get('settings', 'SettingsController@settings')->name('admin.settings');
            Route::post('settings', 'SettingsController@update');
        });
    });

});
