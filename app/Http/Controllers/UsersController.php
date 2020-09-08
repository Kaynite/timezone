<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDatatable;
use App\Models\UserType;
use App\Rules\InTypes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index(UsersDatatable $datatable)
    {
        return $datatable->render('adminlte.users.index');
    }


    public function create()
    {

        $types = UserType::locale()->get();
        return view('adminlte.users.create')->with('types', $types);
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
            'username'     => 'required|max:255',
            'email'        => 'required|email|unique:admins|max:255',
            'password'     => 'required|min:6',
            'user_type_id' => ['required', new InTypes],
        ], [], [
            'username'     => __('common.username'),
            'email'        => __('common.email'),
            'password'     => __('common.password'),
            'user_type_id' => __('admin.users.form.user type'),
        ]);

        $request['password'] = Hash::make($request->password);
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'admin.users.form.success add');
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
        $user = User::findOrFail($id);
        $types = UserType::locale()->get();

        return view('adminlte.users.edit')->with(['user' => $user, 'types' => $types]);
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
        $user = User::findOrFail($id);
        $request->validate([
            'username'     => 'required|max:255',
            'email'        => 'required|email|unique:admins|max:255',
            'user_type_id' => ['required', new InTypes],
        ], [], [
            'username'     => __('common.username'),
            'email'        => __('common.email'),
            'user_type_id' => __('admin.users.form.user type'),
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')
            ->with('success', __('admin.users.form.success update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', __('admin.users.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('users')) {
            return back()->withErrors(['message' => __('admin.users.form.no selection')]);
        }

        User::destroy($request->users);
        return redirect()->route('users.index')
            ->with('success', __('admin.users.form.success multiple delete'));
    }
}
