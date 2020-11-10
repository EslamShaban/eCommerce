<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Size;
use Storage;
use Up;

class SizesController extends Controller
{

    public function index()
    {
        $Sizes = Size::all();
        $title = trans('admin.sizes');
        return view('admin.sizes.index', compact('Sizes', 'title'));
    }


    public function create()
    {

        return view('admin.sizes.create')->with('title', trans('admin.create_new_size'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'sizename_ar'          => 'required',
            'sizename_en'          => 'required',
            'department_id'        => 'required|numeric',
            'is_public'            => 'required|in:yes,no',

        ]);


        Size::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('sizes'));
    }

  
    public function edit($id)
    {
        $size = Size::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.sizes.edit', compact('size','title'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'sizename_ar'          => 'required',
            'sizename_en'          => 'required',
            'department_id'        => 'required|numeric',
            'is_public'            => 'required|in:yes,no',

        ]);


        Size::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('sizes'));
    }

 
    public function destroy($id)
    {
        $Size = Size::find($id)->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('sizes'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $Size = Size::find($id)->delete();
            }

        }else{

            $Size = Size::find($id)->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('sizes'));
        
    }

}
