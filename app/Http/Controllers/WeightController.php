<?php

namespace App\Http\Controllers;

use App\DataTables\WeightDatatable;
use App\Models\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function index(WeightDatatable $datatable)
    {
        return $datatable->render('adminlte.weight.index');
    }

    public function create()
    {
        return view('adminlte.weight.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_ar' => 'required|max:225|string',
            'unit_en' => 'required|max:225|string',
        ], [], [
            'unit_ar' => __('admin.weight.form.unit_ar'),
            'unit_en' => __('admin.weight.form.unit_en'),
        ]);

        Weight::create($request->all());
        return redirect()->route('weight.index')->with('success', 'admin.weight.form.success add');
    }

    public function show($id)
    {
        //
    }

    public function edit(Weight $weight)
    {
        return view('adminlte.weight.edit')->with('unit', $weight);
    }

    public function update(Request $request, Weight $weight)
    {
        $request->validate([
            'unit_ar' => 'required|max:225|string',
            'unit_en' => 'required|max:225|string',
        ], [], [
            'unit_ar' => __('admin.weight.form.unit_ar'),
            'unit_en' => __('admin.weight.form.unit_en'),
        ]);

        $weight->update($request->all());

        return redirect()->route('weight.index')->with('success', __('admin.weight.form.success update'));
    }

    public function destroy(Weight $weight)
    {
        try {
            $weight->delete();
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'An error occured while deleting']);
        }
        return redirect()->route('weight.index')->with('success', __('admin.weight.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('weights')) {
            return back()->withErrors(['message' => __('admin.weight.form.no selection')]);
        }

        Weight::destroy($request->weights);

        return redirect()->route('weight.index')
            ->with('success', __('admin.weight.form.success multiple delete'));
    }
}
