<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;

class UsersTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = UserType::locale()->paginate(10);
        return view('adminlte.userstypes.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.userstypes.create');
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
            'name_ar' => 'required|max:225',
            'name_en' => 'required|max:225',
        ], [], [
            'name_ar' => __('admin.userstypes.form.name_ar'),
            'name_en' => __('admin.userstypes.form.name_en'),
        ]);

        UserType::create($request->all());

        return redirect()->route('userstypes.index')
            ->with('success', __('admin.userstypes.form.success add')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function edit($id)
    {
        $type = UserType::findOrFail($id);
        return view('adminlte.userstypes.edit')->with('type', $type);
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
        $type = UserType::findOrFail($id);
        $request->validate([
            'name_ar' => 'required|max:225',
            'name_en' => 'required|max:225',
        ], [], [
            'name_ar' => __('admin.userstypes.form.name_ar'),
            'name_en' => __('admin.userstypes.form.name_en'),
        ]);

        $type->update($request->all());

        return redirect()
            ->route('userstypes.index')
            ->with('success', __('admin.userstypes.form.success update')); 
    }

    public function destroy($id)
    {
        $type = UserType::findOrFail($id);
        $type->delete();

        return redirect()
            ->route('userstypes.index')
            ->with('success', __('admin.userstypes.form.success delete')); 
    }
}
