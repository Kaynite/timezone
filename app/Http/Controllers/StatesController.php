<?php

namespace App\Http\Controllers;

use App\DataTables\StatesDatatable;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function index(StatesDatatable $datatable)
    {
        return $datatable->render('adminlte.states.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->ajax()) {
            if (request()->has('city_id')) {
                $city = City::with(['country' => function ($query) {$query->locale();}])->where('id', request()->city_id)->first();
                $country = $city->country;
                return view('adminlte.states.ajax.country')->with('country', $country)->render();
            }
        }

        $cities = City::locale()->get();
        return view('adminlte.states.create')->with('cities', $cities);
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
            'city_id'    => 'integer|required',
            'country_id' => 'integer|required',
        ], [], [
            'name_ar'    => __('admin.states.form.name_ar'),
            'name_en'    => __('admin.states.form.name_en'),
            'city_id'    => __('admin.states.form.city'),
            'country_id' => __('admin.states.form.country'),
        ]);

        State::create($request->all());
        return redirect()->route('states.index')->with('success', 'admin.states.form.success add');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $state  = State::with(['country' => function($q) { $q->locale(); }])->findOrFail($id);
        $cities = City::locale()->get();

        return view('adminlte.states.edit')
            ->with([
                'state'   => $state,
                'cities'  => $cities,
                'country' => $state->country,
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
        $state = State::findOrFail($id);
        $request->validate([
            'name_ar'    => 'required|max:225',
            'name_en'    => 'required|max:225',
            'city_id'    => 'integer|required',
            'country_id' => 'integer|required',
        ], [], [
            'name_ar'    => __('admin.states.form.name_ar'),
            'name_en'    => __('admin.states.form.name_en'),
            'city_id'    => __('admin.states.form.city'),
            'country_id' => __('admin.states.form.country'),
        ]);

        $state->update($request->all());
        return redirect()->route('states.index')
            ->with('success', __('admin.states.form.success update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = State::findOrFail($id);

        $city->delete();

        return redirect()->route('states.index')
            ->with('success', __('admin.states.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('states')) {
            return back()->withErrors(['message' => __('admin.states.form.no selection')]);
        }

        State::destroy($request->states);

        return redirect()->route('states.index')
            ->with('success', __('admin.states.form.success multiple delete'));
    }
}
