<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Auth::routes();



Route::get('', function() {
    return view('adminlte.page');
})->name('admin.home');

