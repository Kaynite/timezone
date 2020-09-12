<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\DataTables\CountriesDatatable;
use Illuminate\Support\Facades\Storage;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountriesDatatable $datatable)
    {
        return $datatable->render('adminlte.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.countries.create');
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
            'mob'     => 'required|max:225',
            'code'    => 'required|max:225',
            'logo'    => 'image',
        ], [], [
            'name_ar' => __('admin.countries.form.name_ar'),
            'name_en' => __('admin.countries.form.name_en'),
            'mob'     => __('admin.countries.form.mob'),
            'code'    => __('admin.countries.form.code'),
            'logo'    => __('admin.countries.form.logo'),
        ]);

        if ($request->hasFile('logo')) {
            $name = 'country_' . time();
            $ext  = $request->file('logo')->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('countries', "$name.$ext");
        }

        Country::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'mob'     => $request->mob,
            'code'    => $request->code,
            'logo'    => $path ?? null,
        ]);
        return redirect()->route('countries.index')->with('success', 'admin.countries.form.success add');
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
        $country = Country::findOrFail($id);

        return view('adminlte.countries.edit')->with('country', $country);
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
        $country = Country::findOrFail($id);
        $request->validate([
            'name_ar' => 'required|max:255',
            'name_en' => 'required|max:255',
            'mob'     => 'required|max:255',
            'code'    => 'required|max:255',
            'logo'    => 'image',
        ], [], [
            'name_ar' => __('admin.countries.form.name_ar'),
            'name_en' => __('admin.countries.form.name_en'),
            'mob'     => __('admin.countries.form.mob'),
            'code'    => __('admin.countries.form.code'),
            'logo'    => __('admin.countries.form.logo'),
        ]);

        if ($request->hasFile('logo')) {
            $name = 'country_' . time();
            $ext  = $request->file('logo')->getClientOriginalExtension();
            Storage::delete($country->logo);
            $path = $request->file('logo')->storeAs('countries', "$name.$ext");
            $country->logo = $path;
            $country->save();
        }

        $country->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'mob'     => $request->mob,
            'code'    => $request->code,
        ]);
        return redirect()->route('countries.index')
            ->with('success', __('admin.countries.form.success update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        Storage::delete($country->logo);
        $country->delete();

        return redirect()->route('countries.index')
            ->with('success', __('admin.countries.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('countries')) {
            return back()->withErrors(['message' => __('admin.countries.form.no selection')]);
        }

        foreach($request->countries as $id) {
            $country = Country::find($id);
            Storage::delete($country->logo);
        }

        Country::destroy($request->countries);


        return redirect()->route('countries.index')
            ->with('success', __('admin.countries.form.success multiple delete'));
    }
}