<?php

namespace App\Http\Controllers\Backend;

use App\Role;
use App\User;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('backend.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::latest()->get();
        $roles = Role::latest()->get();
        return view('backend.user.create', ['branches' => $branches, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'email' => 'required | unique:users',
            'name' => 'required',
            'phone' => 'required',
            'branch_id' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        $user = new User();
        $user->email = request('email');
        $user->name = request('name');
        $user->phone = request('phone');
        $user->branch_id = request('branch_id');
        $user->password = bcrypt(request('password'));
        $user->role_id = request('role_id');
        $user->save();

        $request->session()->flash('success', 'Successfully Created!');
        return redirect(route('backend.user.create'));
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
        $branches = Branch::latest()->get();
        $roles = Role::latest()->get();
        return view('backend.user.edit', ['user' => $user, 'branches' => $branches, 'roles' => $roles]);
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
        request()->validate([
            'email' => 'required|unique:users,email,'.$id,
            'name' => 'required',
            'phone' => 'required',
            'branch_id' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        $user = User::find($id);
        $user->email = request('email');
        $user->name = request('name');
        $user->phone = request('phone');
        $user->branch_id = request('branch_id');
        $user->password = bcrypt(request('password'));
        $user->role_id = request('role_id');
        $user->save();

        $request->session()->flash('success', 'Successfully Updated!');
        return redirect(route('backend.user.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect(route('backend.user.index'))->withError('Successfully Deleted!');
    }
}
