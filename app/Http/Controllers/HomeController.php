<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $newProducts = Product::latest()->locale()->limit(6)->get();
        return view('site.main')->with([
            'newProducts' => $newProducts
        ]);
    }
}
