<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Traits\ImagesUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    Use ImagesUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::treeJson()->get();

        $treeJson = [];

        foreach ($categories as $category) {
            if ($category->parent == null) {
                $category->parent = '#';
            }
            array_push($treeJson, $category);
        }

        return view('adminlte.categories.index')->with('treeJson', json_encode($treeJson));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::treeJson()->get();

        $treeJson = [];

        foreach ($categories as $category) {
            if ($category->parent == null) {
                $category->parent = '#';
            }
            array_push($treeJson, $category);
        }

        return view('adminlte.categories.create')->with('treeJson', json_encode($treeJson));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $category = Category::create([
            'name_ar'        => $request->name_ar,
            'name_en'        => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'keywords'       => $request->keywords,
            'icon'           => $request->icon,
            'parent_id'      => $request->parent_id,
            'slug'           => $request->slug
        ]);

        $this->uploadImages($category, 'image', 'image', 'categories');

        return redirect()->route('categories.index')
            ->with('success', __('admin.categories.form.success add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $slug)
    {
        if ($request->ajax()) {
            $category = Category::with(['products' => function($q) use($request) {
                if ($request->has('amount')) {    
                    if($request->has('amount_min')) {
                        $q->where('price', '>=', $request->amount_min);
                    }
    
                    if($request->has('amount_max')) {
                        $q->where('price', '<=', $request->amount_max);
                    }
    
                    if($request->has('colors')) {
                        foreach($request->colors as $color) {
                            $q->where('color_id', $color);
                        }
                    }
                }
            }])->findOrFail($id);
            return response()->json([
                'html'             => view('site.products.ajax.products')->with(['products' => $category->products])->render(),
                'pagination_links' => $category->products()->paginate()->links('vendor.pagination.custom')->render(),
                'count'            => $category->products->count(),
            ]);
        }
        $category = Category::where('id', $id)->where('slug', $slug)->firstOrFail();
        $products = $category->products()->paginate(20);
        $colors   = Color::locale()->withCount('products')->get();
        $max      = Product::orderBy('price', 'desc')->first()->price;
        $min      = Product::orderBy('price', 'asc')->first()->price;
        return view('site.category.category')->with([
            'category' => $category,
            'products' => $products,
            'colors'   => $colors,
            'maxPrice' => ceil($max),
            'minPrice' => ceil($min),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::treeJson()->get();

        $treeJson = [];

        foreach ($categories as $cat) {
            if ($cat->parent == null) {
                $cat->parent = '#';
            }
            $cat['state'] = (object) [
                'opened' => true,
            ];
            if ($category->id == $cat->id) {
                $cat['state'] = (object) [
                    'opened'   => true,
                    'disabled' => true
                ];
            }
            array_push($treeJson, $cat);
        }

        return view('adminlte.categories.edit')->with(['treeJson' => json_encode($treeJson), 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, Category $category)
    {


        if ($request->parent_id == $category->id) {
            return back()->withErrors(['parent_id' => __('admin.categories.forms.same parent child')]);
        }

        $parent_id = $request->parent_id ?? $category->parent_id;
        if ($request->has('makeMain')) {
            $parent_id = null;
        }
        $category->update([
            'name_ar'        => $request->name_ar,
            'name_en'        => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'keywords'       => $request->keywords,
            'icon'           => $request->icon,
            'parent_id'      => $parent_id,
            'slug'           => $request->slug
        ]);

        $this->syncImages($category, 'image', 'image', 'categories');

        return redirect()->route('categories.index')
            ->with('success', __('admin.categories.form.success update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', __('admin.categories.form.success delete'));
    }

    public function makeSlug(Request $request)
    {
        if ($request->ajax() && $request->has('slug')) {
            $slug  = Str::slug($request->title);
            $times = Category::where('slug', 'LIKE', "%$slug%")->count();
            if ($times > 0) {
                $slug = $slug . '-' . strval($times + 1);
            }
            if ($slug != '') {
                return response()->json([
                    'slug'   => $slug,
                    'status' => 'success',
                ]);
            } else {
                return response()->json([
                    'message' => 'Please enter a valid title',
                    'status'  => 'error',
                ]);
            }

        }
    }
}
