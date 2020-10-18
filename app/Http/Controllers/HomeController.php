<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\User;

class HomeController extends Controller
{
    public function home()
    {
        $newProducts = Product::latest()->locale()->inStock()->limit(6)->get();
        $posts       = Post::latest()->limit(4)->get();
        return view('site.main')->with([
            'newProducts' => $newProducts,
            'posts'       => $posts,
        ]);
    }

    public function dashboard()
    {
        $totalOrders     = Order::count();
        $completedOrders = Order::where('completed', true)->count();
        $totalCash       = Order::where('completed', true)->sum('total');

        $numberOfUsers = User::count();

        return view('adminlte.page')->with([
            'totalOrders'     => $totalOrders,
            'totalCash'       => $totalCash,
            'numberOfUsers'   => $numberOfUsers,
            'completedOrders' => $completedOrders,
        ]);
    }

    public function blog()
    {
        $posts = Post::latest()->paginate(10);
        return view('site.blog.main')->with('posts', $posts);
    }
}
