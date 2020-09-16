<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\DataTables\ShippingDatatable;
use Illuminate\Support\Facades\Storage;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingDatatable $datatable)
    {
        return $datatable->render('adminlte.shipping.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('user_type_id', '3')->get();
        return view('adminlte.shipping.create')->with('users', $users);
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
            'user_id'  => 'integer|nullable',
            'logo'     => 'image',
        ], [], [
            'name_ar'  => __('admin.shipping.form.name_ar'),
            'name_en'  => __('admin.shipping.form.name_en'),
            'website'  => __('admin.shipping.form.website'),
            'email'    => __('admin.shipping.form.email'),
            'phone'    => __('admin.shipping.form.phone'),
            'facebook' => __('admin.shipping.form.facebook'),
            'twitter'  => __('admin.shipping.form.twitter'),
            'user_id'  => __('admin.shipping.form.user_id'),
            'logo'     => __('admin.shipping.form.logo'),
        ]);

        if ($request->hasFile('logo')) {
            $name = 'shipping_' . time();
            $ext  = $request->file('logo')->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('shipping', "$name.$ext");
        }

        Shipping::create([
            'name_ar'  => $request->name_ar,
            'name_en'  => $request->name_en,
            'website'  => $request->website,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'facebook' => $request->facebook,
            'twitter'  => $request->twitter,
            'user_id'  => $request->user_id,
            'logo'     => $path ?? null,
        ]);
        return redirect()->route('shipping.index')->with('success', 'admin.shipping.form.success add');
    }

    public function show($id)
    {
        //
    }

    public function edit(Shipping $shipping)
    {
        $users = User::where('user_type_id', '3')->get();
        return view('adminlte.shipping.edit')->with([
            'shipping' => $shipping,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        $request->validate([
            'name_ar'  => 'required|max:255',
            'name_en'  => 'required|max:255',
            'website'  => 'url|max:255',
            'email'    => 'email|max:255',
            'phone'    => 'string|max:255',
            'facebook' => 'url|max:255',
            'twitter'  => 'url|max:255',
            'user_id'  => 'integer|nullable',
            'logo'     => 'image',
        ], [], [
            'name_ar'  => __('admin.shipping.form.name_ar'),
            'name_en'  => __('admin.shipping.form.name_en'),
            'website'  => __('admin.shipping.form.website'),
            'email'    => __('admin.shipping.form.email'),
            'phone'    => __('admin.shipping.form.phone'),
            'facebook' => __('admin.shipping.form.facebook'),
            'twitter'  => __('admin.shipping.form.twitter'),
            'user_id'  => __('admin.shipping.form.user_id'),
            'logo'     => __('admin.shipping.form.logo'),
        ]);

        if ($request->hasFile('logo')) {
            $name = 'shipping_' . time();
            $ext  = $request->file('logo')->getClientOriginalExtension();
            Storage::delete($shipping->logo);
            $path = $request->file('logo')->storeAs('shipping', "$name.$ext");
        }

        $shipping->update([
            'name_ar'  => $request->name_ar,
            'name_en'  => $request->name_en,
            'website'  => $request->website,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'facebook' => $request->facebook,
            'twitter'  => $request->twitter,
            'user_id'  => $request->user_id,
            'logo'     => $path ?? $shipping->logo,
        ]);

        return redirect()->route('shipping.index')
            ->with('success', __('admin.shipping.form.success update'));
    }

    public function destroy(Shipping $shipping)
    {

        Storage::delete($shipping->logo);
        $shipping->delete();

        return redirect()->route('shipping.index')
            ->with('success', __('admin.shipping.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('shippings')) {
            return back()->withErrors(['message' => __('admin.shipping.form.no selection')]);
        }

        foreach ($request->shippings as $id) {
            $shipping = Shipping::find($id);
            Storage::delete($shipping->logo);
        }

        Shipping::destroy($request->shippings);

        return redirect()->route('shipping.index')
            ->with('success', __('admin.shipping.form.success multiple delete'));
    }
}
