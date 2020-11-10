<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mall;
use App\Country;
use Storage;
use Up;

class MallsController extends Controller
{

    public function index()
    {
        $malls = Mall::all();
        $title = trans('admin.malls');
        return view('admin.malls.index', compact('malls', 'title'));
    }


    public function create()
    {
        $countryname = 'countryname_' . lang();
        $countries = Country::pluck($countryname,'id');
        return view('admin.malls.create')->with([
                                            'title'     =>trans('admin.create_new_mall'),
                                            'countries' => $countries
                                        ]);
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'mallname_ar'        => 'required',
            'mallname_en'        => 'required',
            'country_id'         => 'required|numeric',
            'email'              => 'required|email',
            'mobile'             => 'required|numeric',
            'facebook'           => 'sometimes|nullable|url',
            'twitter'            => 'sometimes|nullable|url',
            'website'            => 'sometimes|nullable|url',
            'contact_name'       => 'sometimes|nullable|string',
            'address'            => 'sometimes|nullable|string',
            'lng'                => 'sometimes|nullable',
            'lat'                => 'sometimes|nullable',
            'logo'               => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif'

        ]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'malls',
                'upload_type'   => 'single',
                'delete_file'   => ''
            ]);
        }


        Mall::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('malls'));
    }

  
    public function edit($id)
    {
        $mall = Mall::where('id', $id)->first();
        $countryname = 'countryname_' . lang();
        $countries = Country::pluck($countryname,'id');
        $title = trans('admin.edit_admin');
        return view('admin.malls.edit', compact('mall','countries','title'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'mallname_ar'        => 'required',
            'mallname_en'        => 'required',
            'country_id'         => 'required|numeric',
            'email'              => 'required|email',
            'mobile'             => 'required|numeric',
            'facebook'           => 'sometimes|nullable|url',
            'twitter'            => 'sometimes|nullable|url',
            'website'            => 'sometimes|nullable|url',
            'contact_name'       => 'sometimes|nullable|string',
            'address'            => 'sometimes|nullable|string',
            'lng'                => 'sometimes|nullable',
            'lat'                => 'sometimes|nullable',
            'logo'               => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif'

        ]);
        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'malls',
                'upload_type'   => 'single',
                'delete_file'   => Mall::find($id)->logo
            ]);
        }


        Mall::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('malls'));
    }

 
    public function destroy($id)
    {
        $mall = Mall::find($id);
        Storage::delete($mall->logo);

        $mall->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('malls'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $mall = Mall::find($id);
                Storage::delete($mall->logo);
        
                $mall->delete();
            }

        }else{

            $mall = Mall::find(request('item'));
            Storage::delete($mall->logo);
    
            $mall->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('malls'));
        
    }

}
