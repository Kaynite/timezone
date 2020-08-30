<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Auth::routes();

// Admin Routes Group
Route::group(['middleware' => 'auth'], function () {
    
    Route::view('', 'adminlte.page')->name('admin.home');

});