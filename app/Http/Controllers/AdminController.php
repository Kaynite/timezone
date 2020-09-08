<?php

namespace App\Http\Controllers;

use App\DataTables\AdminDatatable;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $datatable)
    {
        return $datatable->render('adminlte.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.admins.create');
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
            'username' => 'required|max:255',
            'email'    => 'required|email|unique:admins|max:255',
            'password' => 'required|min:6',
        ], [], [
            'username' => __('admin.admins.form.username'),
            'email'    => __('admin.admins.form.email'),
            'password' => __('admin.admins.form.password'),
        ]);

        $request['password'] = Hash::make($request->password);
        Admin::create($request->all());

        return redirect()->route('admins.index')->with('success', 'admin.admins.form.success add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $admin = Admin::findOrFail($id);

        return view('adminlte.admins.edit')->with('admin', $admin);
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
        $admin = Admin::findOrFail($id);
        $request->validate([
            'username' => 'required|max:255',
            'email'    => "required|email|max:255|unique:admins,email,{$id}",
        ]);

        $admin->update($request->all());
        return redirect()->route('admins.index')
            ->with('success', __('admin.admins.form.success update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        if (auth('admin')->id() == $id) {
            return back()->withErrors(['message' => 'You can\'t delete yourself as an admin!']);
        }

        $admin->delete();

        return redirect()->route('admins.index')
            ->with('success', __('admin.admins.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if(!$request->has('admins')) {
            return back()->withErrors(['message' => __('admin.admins.form.no selection')]);
        }

        if(in_array(auth('admin')->id(), $request->admins)) {
            return back()->withErrors(['message' => __('admin.admins.form.admin no delete')]);
        }

        Admin::destroy($request->admins);
        return redirect()->route('admins.index')
                    ->with('success', __('admin.admins.form.success multiple delete'));
    }
}
