<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trademark;
use Storage;
use Up;

class TrademarksController extends Controller
{

    public function index()
    {
        $trademarks = Trademark::all();
        $title = trans('admin.trademarks');
        return view('admin.trademarks.index', compact('trademarks', 'title'));
    }


    public function create()
    {
        return view('admin.trademarks.create')->with('title',trans('admin.create_new_trademark'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'tradmarkname_ar'        => 'required',
            'tradmarkname_en'        => 'required',
            'logo'                  => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif'
        ]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'trademarks',
                'upload_type'   => 'single',
                'delete_file'   => ''
            ]);
        }


        Trademark::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('trademarks'));
    }

  
    public function edit($id)
    {
        $trademark = Trademark::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.trademarks.edit', compact('trademark', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tradmarkname_ar'        => 'required',
            'tradmarkname_en'        => 'required',
            'logo'                  => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif'
        ]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'trademarks',
                'upload_type'   => 'single',
                'delete_file'   => Trademark::find($id)->logo
            ]);
        }


        Trademark::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('trademarks'));
    }

 
    public function destroy($id)
    {
        $Trademark = Trademark::find($id);
        Storage::delete($Trademark->logo);

        $Trademark->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('trademarks'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $Trademark = Trademark::find($id);
                Storage::delete($Trademark->logo);
        
                $Trademark->delete();
            }

        }else{

            $Trademark = Trademark::find(request('item'));
            Storage::delete($Trademark->logo);
    
            $Trademark->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('trademarks'));
        
    }

}
