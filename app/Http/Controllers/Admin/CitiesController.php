<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use App\Country;
use Storage;
use Up;

class CitiesController extends Controller
{

    public function index()
    {
        $cities = City::all();
        $title = trans('admin.cities');
        return view('admin.cities.index', compact('cities', 'title'));
    }


    public function create()
    {
        $countryname = 'countryname_' . lang();
        $countries = Country::pluck($countryname,'id');
        return view('admin.cities.create')->with([
                                            'title'     =>trans('admin.create_new_city'),
                                            'countries' => $countries
                                        ]);
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'cityname_ar'        => 'required',
            'cityname_en'        => 'required',
            'country_id'         => 'required',
    
            ]);


        City::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('cities'));
    }

  
    public function edit($id)
    {
        $city = City::where('id', $id)->first();
        $countryname = 'countryname_' . lang();
        $countries = Country::pluck($countryname,'id');
        $title = trans('admin.edit_admin');
        return view('admin.cities.edit', compact('city', 'title', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'cityname_ar'        => 'required',
            'cityname_en'        => 'required',
            'country_id'         => 'required',
    
            ]);


        City::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('cities'));
    }

 
    public function destroy($id)
    {
        
        City::find($id)->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('cities'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            City::destroy(request('item'));

        }else{

            City::find(request('item'))->delete();    

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('cities'));
        
    }

}
