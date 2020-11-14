<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use Storage;
use Up;

class CountriesController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        $title = trans('admin.countries');
        return view('admin.countries.index', compact('countries', 'title'));
    }


    public function create()
    {
        return view('admin.countries.create')->with('title',trans('admin.create_new_country'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'countryname_ar'        => 'required',
            'countryname_en'        => 'required',
            'mob'                   => 'required',
            'currency'              => 'required',
            'code'                  => 'required',
            'logo'                  => 'required|image|mimes:jpg,png,jpeg,gif'
        ],[],['logo' => trans('admin.country_logo')]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'countries',
                'upload_type'   => 'single',
                'delete_file'   => ''
            ]);
        }


        Country::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('countries'));
    }

  
    public function edit($id)
    {
        $country = Country::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.countries.edit', compact('country', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'countryname_ar'        => 'required',
            'countryname_en'        => 'required',
            'currency'              => 'required',
            'mob'                   => 'required',
            'code'                  => 'required',
            'logo'                  => 'image|mimes:jpg,png,jpeg,gif'
        ],[],['logo' => trans('admin.country_logo')]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'countries',
                'upload_type'   => 'single',
                'delete_file'   => Country::find($id)->logo
            ]);
        }


        Country::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('countries'));
    }

 
    public function destroy($id)
    {
        $Country = Country::find($id);
        Storage::delete($Country->logo);

        $Country->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('countries'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $Country = Country::find($id);
                Storage::delete($Country->logo);
        
                $Country->delete();
            }

        }else{

            $Country = Country::find(request('item'));
            Storage::delete($Country->logo);
    
            $Country->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('countries'));
        
    }

}
