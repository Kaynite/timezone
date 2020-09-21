<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\SizesDatatable;

class SizesController extends Controller
{

    public function index(SizesDatatable $datatable)
    {
        return $datatable->render('adminlte.sizes.index');
    }

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

        return view('adminlte.sizes.create')->with('treeJson', json_encode($treeJson));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'     => 'required|max:225|string',
            'name_en'     => 'required|max:225|string',
            'category_id' => 'required|exists:categories,id',
            'public'      => 'boolean',
        ], [], [
            'name_ar'     => __('admin.sizes.form.name_ar'),
            'name_en'     => __('admin.sizes.form.name_en'),
            'category_id' => __('admin.sizes.form.category_id'),
            'public'      => __('admin.sizes.form.public'),
        ]);

        Size::create($request->all());
        return redirect()->route('sizes.index')->with('success', 'admin.sizes.form.success add');
    }

    public function show($id)
    {
        //
    }

    public function edit(Size $size)
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
            if ($size->category_id == $cat->id) {
                $cat['state'] = (object) [
                    'opened'   => true,
                    'disabled' => true
                ];
            }
            array_push($treeJson, $cat);
        }

        return view('adminlte.sizes.edit')->with(['size' => $size, 'treeJson' => json_encode($treeJson)]);
    }

    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name_ar'     => 'required|max:225|string',
            'name_en'     => 'required|max:225|string',
            'category_id' => 'required|exists:categories,id',
            'public'      => 'boolean',
        ], [], [
            'name_ar'     => __('admin.sizes.form.name_ar'),
            'name_en'     => __('admin.sizes.form.name_en'),
            'category_id' => __('admin.sizes.form.category_id'),
            'public'      => __('admin.sizes.form.public'),
        ]);

        $size->update($request->all());

        return redirect()->route('sizes.index')
            ->with('success', __('admin.sizes.form.success update'));
    }

    public function destroy(Size $size)
    {
        try {
            $size->delete();
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'An error occured while deleting']);
        }
        return redirect()->route('sizes.index')
            ->with('success', __('admin.sizes.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('sizes')) {
            return back()->withErrors(['message' => __('admin.sizes.form.no selection')]);
        }

        Size::destroy($request->sizes);

        return redirect()->route('sizes.index')
            ->with('success', __('admin.sizes.form.success multiple delete'));
    }
}
