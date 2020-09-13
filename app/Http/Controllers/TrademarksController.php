<?php

namespace App\Http\Controllers;

use App\DataTables\TrademarlsDatatable;
use App\Models\Trademark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrademarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TrademarlsDatatable $datatable)
    {
        return $datatable->render('adminlte.trademarks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.trademarks.create');
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
            'name_ar' => 'required|max:255',
            'name_en' => 'required|max:255',
            'image'   => 'image',
        ], [], [
            'name_ar' => __('admin.trademarks.form.name_ar'),
            'name_en' => __('admin.trademarks.form.name_en'),
            'image'   => __('admin.trademarks.form.image'),
        ]);

        if ($request->hasFile('image')) {
            $name = 'trademark_' . time();
            $ext  = $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('trademarks', "$name.$ext");
        }

        Trademark::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'image'   => $path ?? null,
        ]);

        return redirect()->route('trademarks.index')->with('success', 'admin.trademarks.form.success add');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trademark = Trademark::findOrFail($id);

        return view('adminlte.trademarks.edit')->with('trademark', $trademark);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trademark = Trademark::findOrFail($id);
        $request->validate([
            'name_ar' => 'required|max:255',
            'name_en' => 'required|max:255',
            'image'   => 'image',
        ], [], [
            'name_ar' => __('admin.trademarks.form.name_ar'),
            'name_en' => __('admin.trademarks.form.name_en'),
            'image'   => __('admin.trademarks.form.image'),
        ]);

        if ($request->hasFile('image')) {
            $name = 'trademark_' . time();
            $ext  = $request->file('image')->getClientOriginalExtension();
            Storage::delete($trademark->image);
            $path = $request->file('image')->storeAs('trademarks', "$name.$ext");
            $trademark->image = $path;
            $trademark->save();
        }

        $trademark->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);
        return redirect()->route('trademarks.index')
            ->with('success', __('admin.trademarks.form.success update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trademark = Trademark::findOrFail($id);

        $trademark->delete();

        return redirect()->route('trademarks.index')
            ->with('success', __('admin.trademarks.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('trademarks')) {
            return back()->withErrors(['message' => __('admin.trademarks.form.no selection')]);
        }

        Trademark::destroy($request->trademarks);
        return redirect()->route('trademarks.index')
            ->with('success', __('admin.trademarks.form.success multiple delete'));
    }
}
