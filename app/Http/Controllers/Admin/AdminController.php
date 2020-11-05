<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        $title = trans('admin.admin');
        return view('admin.admins.index', compact('admins', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create')->with('title',trans('admin.create_new_admin'));
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
            'email'     => 'required|email|unique:admins',
            'password'  => 'required|min:6'
        ]);

        $data['password'] = bcrypt(request('password'));

        Admin::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('admin'));
    }


    public function edit($id)
    {
        $admin = Admin::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.admins.edit', compact('admin', 'title'));
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:admins,email,' . $id,
            'password'  => 'sometimes|nullable|min:6'
        ]);

        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }

        Admin::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;

    }

    public function multi_delete()
    {
        
        Admin::destroy(request('item'));

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('admin'));
    }
}
