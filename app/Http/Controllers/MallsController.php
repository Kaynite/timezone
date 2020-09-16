<?php

namespace App\Http\Controllers;

use App\DataTables\MallsDatatable;
use App\Models\Country;
use App\Models\Mall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MallsDatatable $datatable)
    {
        return $datatable->render('adminlte.malls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::locale()->get();
        return view('adminlte.malls.create')->with('countries', $countries);
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
            'name_ar'    => 'required|max:255',
            'name_en'    => 'required|max:255',
            'website'    => 'url|max:255',
            'email'      => 'email|max:255',
            'phone'      => 'string|max:255',
            'facebook'   => 'url|max:255',
            'twitter'    => 'url|max:255',
            'country_id' => 'integer|nullable',
            'logo'       => 'image',
        ], [], [
            'name_ar'    => __('admin.malls.form.name_ar'),
            'name_en'    => __('admin.malls.form.name_en'),
            'website'    => __('admin.malls.form.website'),
            'email'      => __('admin.malls.form.email'),
            'phone'      => __('admin.malls.form.phone'),
            'facebook'   => __('admin.malls.form.facebook'),
            'twitter'    => __('admin.malls.form.twitter'),
            'country_id' => __('admin.malls.form.country_id'),
            'logo'       => __('admin.malls.form.logo'),
        ]);

        if ($request->hasFile('logo')) {
            $name = 'malls_' . time();
            $ext  = $request->file('logo')->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('malls', "$name.$ext");
        }

        Mall::create([
            'name_ar'    => $request->name_ar,
            'name_en'    => $request->name_en,
            'website'    => $request->website,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'facebook'   => $request->facebook,
            'twitter'    => $request->twitter,
            'country_id' => $request->country_id,
            'logo'       => $path ?? null,
        ]);
        return redirect()->route('malls.index')->with('success', 'admin.malls.form.success add');
    }

    public function show($id)
    {
        //
    }

    public function edit(Mall $mall)
    {
        $countries = Country::locale()->get();
        return view('adminlte.malls.edit')->with([
            'mall'      => $mall,
            'countries' => $countries,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mall $mall)
    {
        $request->validate([
            'name_ar'    => 'required|max:255',
            'name_en'    => 'required|max:255',
            'website'    => 'url|max:255',
            'email'      => 'email|max:255',
            'phone'      => 'string|max:255',
            'facebook'   => 'url|max:255',
            'twitter'    => 'url|max:255',
            'country_id' => 'integer|nullable',
            'logo'       => 'image',
        ], [], [
            'name_ar'    => __('admin.malls.form.name_ar'),
            'name_en'    => __('admin.malls.form.name_en'),
            'website'    => __('admin.malls.form.website'),
            'email'      => __('admin.malls.form.email'),
            'phone'      => __('admin.malls.form.phone'),
            'facebook'   => __('admin.malls.form.facebook'),
            'twitter'    => __('admin.malls.form.twitter'),
            'country_id' => __('admin.malls.form.country_id'),
            'logo'       => __('admin.malls.form.logo'),
        ]);

        if ($request->hasFile('logo')) {
            $name = 'malls_' . time();
            $ext  = $request->file('logo')->getClientOriginalExtension();
            Storage::delete($mall->logo);
            $path = $request->file('logo')->storeAs('malls', "$name.$ext");
        }

        $mall->update([
            'name_ar'    => $request->name_ar,
            'name_en'    => $request->name_en,
            'website'    => $request->website,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'facebook'   => $request->facebook,
            'twitter'    => $request->twitter,
            'country_id' => $request->country_id,
            'logo'       => $path ?? $mall->logo,
        ]);

        return redirect()->route('malls.index')
            ->with('success', __('admin.malls.form.success update'));
    }

    public function destroy(Mall $mall)
    {

        Storage::delete($mall->logo);
        $mall->delete();

        return redirect()->route('malls.index')
            ->with('success', __('admin.malls.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('malls')) {
            return back()->withErrors(['message' => __('admin.malls.form.no selection')]);
        }

        foreach ($request->malls as $id) {
            $mall = Mall::find($id);
            Storage::delete($mall->logo);
        }

        Mall::destroy($request->malls);

        return redirect()->route('malls.index')
            ->with('success', __('admin.malls.form.success multiple delete'));
    }
}
