<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\State;
use App\City;
use App\Country;
use Storage;
use Up;

class StatesController extends Controller
{

    public function index()
    {
        $states = State::all();
        $title = trans('admin.states');
        return view('admin.states.index', compact('states', 'title'));
    }


    public function create()
    {

        if(request()->ajax()){

            if(request()->has('country_id')){
            
                $cityname = 'cityname_' . lang();
                $cities = City::where('country_id', request('country_id'))->pluck($cityname,'id');
                $city = "<option value=''>" . trans('admin.city_id') . "</option>";
                $select = '';
                foreach($cities as $id=>$cityname){

                    if(request()->has('city_id')){
                        $select = request('city_id') == $id ? 'selected' : '';
                    }
                    $city .= "<option $select value='$id'>" . $cityname . "</option>";
                    
                }
                
                return $city;
            }
        }
        $countryname = 'countryname_' . lang();
        $countries = Country::pluck($countryname,'id');
        return view('admin.states.create')->with([
                                            'title'     =>trans('admin.create_new_state'),
                                            'countries' => $countries
                                        ]);

    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'statename_ar'        => 'required',
            'statename_en'        => 'required',
            'country_id'          => 'required',
            'city_id'             => 'required',
    
            ]);


        State::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('states'));
    }

  
    public function edit($id)
    {
        $countryname = 'countryname_' . lang();
        $countries = Country::pluck($countryname,'id');

        $country_id = State::where('id', $id)->pluck('country_id');

        $cityname = 'cityname_' . lang();
        $cities = City::where('country_id', $country_id)->pluck($cityname,'id');

        $state = State::where('id', $id)->first();

        $title = trans('admin.edit_admin');
        return view('admin.states.edit', compact('state', 'title', 'countries', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'statename_ar'        => 'required',
            'statename_en'        => 'required',
            'country_id'          => 'required',
            'city_id'             => 'required',

            ]);


        State::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('states'));
    }

 
    public function destroy($id)
    {
        State::find($id)->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('states'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            State::destroy(request('item'));

        }else{

            State::find(request('item'))->delete();    

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('states'));
        
    }

}
