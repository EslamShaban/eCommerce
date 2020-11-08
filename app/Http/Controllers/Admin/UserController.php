<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $title = trans('admin.users');
        return view('admin.users.index', compact('users', 'title'));
    }


    public function create()
    {
        return view('admin.users.create')->with('title',trans('admin.create_new_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'level'     => 'required|in:user,company,vendor',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ]);

        $data['password'] = bcrypt(request('password'));

        User::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('users'));
    }


    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.users.edit', compact('user', 'title'));
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'      => 'required',
            'level'     => 'required|in:user,company,vendor',
            'email'     => 'required|email|unique:users,email,' . $id,
            'password'  => 'sometimes|nullable|min:6'
        ]);

        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }

        User::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('users'));
    }

    public function destroy($id)
    {
        return $id;

    }

    public function multi_delete()
    {
        
        User::destroy(request('item'));
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('users'));
        
    }
}
