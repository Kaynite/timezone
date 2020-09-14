<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
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
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'   => 'required|max:225',
            'name_en'   => 'required|max:225',
            'parent_id' => 'numeric|nullable',
            'image'     => 'image|nullable',
        ]);

        if ($request->hasFile('image')) {
            $name = 'categories_' . time();
            $ext  = $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('categories', "$name.$ext");
        }

        Category::create([
            'name_ar'        => $request->name_ar,
            'name_en'        => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'keywords'       => $request->keywords,
            'icon'           => $request->icon,
            'image'          => $path ?? '',
            'parent_id'      => $request->parent_id,
        ]);

        return redirect()->route('categories.index')
            ->with('success', __('admin.categories.form.success add'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
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
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_ar'   => 'required|max:225',
            'name_en'   => 'required|max:225',
            'parent_id' => 'numeric|nullable',
            'image'     => 'image',
        ]);

        if ($request->hasFile('image')) {
            $name = 'categories_' . time();
            $ext  = $request->file('image')->getClientOriginalExtension();
            Storage::delete($category->image);
            $path = $request->file('image')->storeAs('categories', "$name.$ext");
        }

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
            'image'          => $path ?? $category->image,
            'parent_id'      => $parent_id,
        ]);

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
}
