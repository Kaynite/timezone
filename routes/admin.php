<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{

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

        });
    });

});




