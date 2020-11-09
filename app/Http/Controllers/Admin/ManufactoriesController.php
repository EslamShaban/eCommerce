<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manufactory;
use Storage;
use Up;

class ManufactoriesController extends Controller
{

    public function index()
    {
        $manufactories = Manufactory::all();
        $title = trans('admin.manufactories');
        return view('admin.manufactories.index', compact('manufactories', 'title'));
    }


    public function create()
    {
        return view('admin.manufactories.create')->with('title',trans('admin.create_new_manufactory'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'manufactoryname_ar'        => 'required',
            'manufactoryname_en'        => 'required',
            'email'                     => 'required|email',
            'mobile'                    => 'required|numeric',
            'facebook'                  => 'sometimes|nullable|url',
            'twitter'                   => 'sometimes|nullable|url',
            'website'                   => 'sometimes|nullable|url',
            'contact_name'              => 'sometimes|nullable|string',
            'address'                   => 'sometimes|nullable|string',
            'lng'                       => 'sometimes|nullable',
            'lat'                       => 'sometimes|nullable',
            'logo'                      => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif'

        ]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'manufactories',
                'upload_type'   => 'single',
                'delete_file'   => ''
            ]);
        }


        Manufactory::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('manufactories'));
    }

  
    public function edit($id)
    {
        $manufactory = Manufactory::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.manufactories.edit', compact('manufactory', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'manufactoryname_ar'        => 'required',
            'manufactoryname_en'        => 'required',
            'email'                     => 'required|email',
            'mobile'                    => 'required|numeric',
            'facebook'                  => 'sometimes|nullable|url',
            'twitter'                   => 'sometimes|nullable|url',
            'website'                   => 'sometimes|nullable|url',
            'contact_name'              => 'sometimes|nullable|string',
            'lng'                       => 'sometimes|nullable',
            'lat'                       => 'sometimes|nullable',
            'logo'                      => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif'

        ]);
        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'manufactories',
                'upload_type'   => 'single',
                'delete_file'   => Manufactory::find($id)->logo
            ]);
        }


        Manufactory::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('manufactories'));
    }

 
    public function destroy($id)
    {
        $Manufactory = Manufactory::find($id);
        Storage::delete($Manufactory->logo);

        $Manufactory->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('manufactories'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $Manufactory = Manufactory::find($id);
                Storage::delete($Manufactory->logo);
        
                $Manufactory->delete();
            }

        }else{

            $Manufactory = Manufactory::find(request('item'));
            Storage::delete($Manufactory->logo);
    
            $Manufactory->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('manufactories'));
        
    }

}
