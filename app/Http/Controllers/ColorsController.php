<?php

namespace App\Http\Controllers;

use App\DataTables\ColorsDatatable;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{

    public function index(ColorsDatatable $datatable)
    {
        return $datatable->render('adminlte.colors.index');
    }

    public function create()
    {
        return view('adminlte.colors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|max:225|string',
            'name_en' => 'required|max:225|string',
            'color'   => 'required|max:225|string',
        ], [], [
            'name_ar' => __('admin.colors.form.name_ar'),
            'name_en' => __('admin.colors.form.name_en'),
            'color'   => __('admin.colors.form.color'),
        ]);

        Color::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'color'   => $request->color,
        ]);
        return redirect()->route('colors.index')->with('success', 'admin.colors.form.success add');
    }

    public function show($id)
    {
        //
    }

    public function edit(Color $color)
    {
        return view('adminlte.colors.edit')->with(['color' => $color]);
    }

    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name_ar' => 'required|max:225|string',
            'name_en' => 'required|max:225|string',
            'color'   => 'required|max:225|string',
        ], [], [
            'name_ar' => __('admin.colors.form.name_ar'),
            'name_en' => __('admin.colors.form.name_en'),
            'color'   => __('admin.colors.form.color'),
        ]);

        $color->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'color'   => $request->color,
        ]);

        return redirect()->route('colors.index')
            ->with('success', __('admin.colors.form.success update'));
    }

    public function destroy(Color $color)
    {
        try {
            $color->delete();
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'An error occured while deleting']);
        }
        return redirect()->route('colors.index')
            ->with('success', __('admin.colors.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('colors')) {
            return back()->withErrors(['message' => __('admin.colors.form.no selection')]);
        }

        Color::destroy($request->colors);

        return redirect()->route('colors.index')
            ->with('success', __('admin.colors.form.success multiple delete'));
    }
}
