<?php

namespace App\Http\Controllers;

use App\DataTables\ManufacturersDatatable;
use App\Models\Manufacturer;
use App\Traits\ImagesUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManufacturersController extends Controller
{
    use ImagesUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManufacturersDatatable $datatable)
    {
        return $datatable->render('adminlte.manufacturers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.manufacturers.create');
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
            'name_ar'  => 'required|max:255',
            'name_en'  => 'required|max:255',
            'website'  => 'url|max:255',
            'email'    => 'email|max:255',
            'phone'    => 'string|max:255',
            'facebook' => 'url|max:255',
            'twitter'  => 'url|max:255',
            'lat'      => 'string|max:255',
            'lng'      => 'string|max:255',
            'logo'    => 'image',
        ], [], [
            'name_ar'  => __('admin.manufacturers.form.name_ar'),
            'name_en'  => __('admin.manufacturers.form.name_en'),
            'website'  => __('admin.manufacturers.form.website'),
            'email'    => __('admin.manufacturers.form.email'),
            'phone'    => __('admin.manufacturers.form.phone'),
            'facebook' => __('admin.manufacturers.form.facebook'),
            'twitter'  => __('admin.manufacturers.form.twitter'),
            'lat'      => __('admin.manufacturers.form.lat'),
            'lng'      => __('admin.manufacturers.form.lng'),
            'logo'    => __('admin.manufacturers.form.logo'),
        ]);

        $manufacturer = Manufacturer::create([
            'name_ar'  => $request->name_ar,
            'name_en'  => $request->name_en,
            'website'  => $request->website,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'facebook' => $request->facebook,
            'twitter'  => $request->twitter,
            'lat'      => $request->lat,
            'lng'      => $request->lng,
        ]);

        $this->uploadImages($manufacturer, 'logo', 'logo', 'manufacturer');

        return redirect()->route('manufacturers.index')
            ->with('success', __('admin.manufacturers.form.success add'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $manufacturer = Manufacturer::with('logo')->findOrFail($id);
        return view('adminlte.manufacturers.edit')->with('manufacturer', $manufacturer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $request->validate([
            'name_ar'  => 'required|max:255',
            'name_en'  => 'required|max:255',
            'website'  => 'url|max:255',
            'email'    => 'email|max:255',
            'phone'    => 'string|max:255',
            'facebook' => 'url|max:255',
            'twitter'  => 'url|max:255',
            'lat'      => 'string|max:255',
            'lng'      => 'string|max:255',
            'logo'    => 'image',
        ], [], [
            'name_ar'  => __('admin.manufacturers.form.name_ar'),
            'name_en'  => __('admin.manufacturers.form.name_en'),
            'website'  => __('admin.manufacturers.form.website'),
            'email'    => __('admin.manufacturers.form.email'),
            'phone'    => __('admin.manufacturers.form.phone'),
            'facebook' => __('admin.manufacturers.form.facebook'),
            'twitter'  => __('admin.manufacturers.form.twitter'),
            'lat'      => __('admin.manufacturers.form.lat'),
            'lng'      => __('admin.manufacturers.form.lng'),
            'logo'    => __('admin.manufacturers.form.logo'),
        ]);

        $manufacturer->update([
            'name_ar'  => $request->name_ar,
            'name_en'  => $request->name_en,
            'website'  => $request->website,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'facebook' => $request->facebook,
            'twitter'  => $request->twitter,
            'lat'      => $request->lat,
            'lng'      => $request->lng,
        ]);

        $this->syncImages($manufacturer, 'logo', 'logo', 'manufacturer');

        return redirect()->route('manufacturers.index')
            ->with('success', __('admin.manufacturers.form.success update'));
    }

    public function destroy(Manufacturer $manufacturer)
    {

        Storage::delete($manufacturer->logo);
        $manufacturer->delete();

        return redirect()->route('manufacturers.index')
            ->with('success', __('admin.manufacturers.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('manufacturers')) {
            return back()->withErrors(['message' => __('admin.manufacturers.form.no selection')]);
        }

        foreach ($request->manufacturers as $id) {
            $manufacturer = Manufacturer::find($id);
            Storage::delete($manufacturer->logo);
        }

        Manufacturer::destroy($request->manufacturers);

        return redirect()->route('manufacturers.index')
            ->with('success', __('admin.manufacturers.form.success multiple delete'));
    }
}
