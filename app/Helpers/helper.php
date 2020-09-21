<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if(!function_exists('siteLang')) {
    function siteLang() {
        return LaravelLocalization::getCurrentLocale();
    }
}
