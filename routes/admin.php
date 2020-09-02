<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication Routes

Route::group(['namespace' => 'AdminAuth'], function () {
    Route::get('login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'AdminLoginController@login');

    Route::get('register', 'AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'AdminRegisterController@register');

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

});

// Admin Routes Group
Route::group(['middleware' => 'admin:admin'], function () {
    Route::view('/', 'adminlte.page')->name('admin.home');
});