<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use Storage;
use Up;

class ColorsController extends Controller
{

    public function index()
    {
        $Colors = Color::all();
        $title = trans('admin.colors');
        return view('admin.colors.index', compact('Colors', 'title'));
    }


    public function create()
    {

        return view('admin.colors.create')->with('title', trans('admin.create_new_color'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'colorname_ar'          => 'required',
            'colorname_en'          => 'required',
            'color'                 => 'required|string',

        ]);


        Color::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('colors'));
    }

  
    public function edit($id)
    {
        $color = Color::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.colors.edit', compact('color','title'));
    }

    public function update(Request $request, $id)
    {

            $data = $request->validate([
                'colorname_ar'          => 'required',
                'colorname_en'          => 'required',
                'color'                 => 'required|string',
    
            ]);

        Color::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('colors'));
    }

 
    public function destroy($id)
    {
        $Color = Color::find($id)->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('colors'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $Color = Color::find($id)->delete();
            }

        }else{

            $Color = Color::find($id)->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('colors'));
        
    }

}
