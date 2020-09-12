<?php

namespace App\Http\Controllers;

use App\DataTables\CitiesDatatable;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CitiesController extends Controller
{/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index(CitiesDatatable $datatable)
    {
        return $datatable->render('adminlte.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::locale()->get();   
        return view('adminlte.cities.create')->with('countries', $countries);
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
            'name_ar'    => 'required|max:225',
            'name_en'    => 'required|max:225',
            'country_id' => 'integer|required',
        ], [], [
            'name_ar'    => __('admin.cities.form.name_ar'),
            'name_en'    => __('admin.cities.form.name_en'),
            'country_id' => __('admin.cities.form.country'),
        ]);

        City::create($request->all());
        return redirect()->route('cities.index')->with('success', 'admin.cities.form.success add');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        $countries = Country::locale()->get();

        return view('adminlte.cities.edit')
            ->with([
                'city' => $city,
                'countries' => $countries
            ]);
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
        $city = City::findOrFail($id);
        $request->validate([
            'name_ar'    => 'required|max:225',
            'name_en'    => 'required|max:225',
            'country_id' => 'integer|required',
        ], [], [
            'name_ar'    => __('admin.cities.form.name_ar'),
            'name_en'    => __('admin.cities.form.name_en'),
            'country_id' => __('admin.cities.form.country'),
        ]);

        $city->update($request->all());
        return redirect()->route('countries.index')
            ->with('success', __('admin.cities.form.success update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect()->route('cities.index')
            ->with('success', __('admin.cities.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('cities')) {
            return back()->withErrors(['message' => __('admin.cities.form.no selection')]);
        }

        City::destroy($request->cities);

        return redirect()->route('cities.index')
            ->with('success', __('admin.cities.form.success multiple delete'));
    }
}
