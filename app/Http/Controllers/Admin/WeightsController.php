<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Weight;
use Storage;
use Up;

class WeightsController extends Controller
{

    public function index()
    {
        $Weights = Weight::all();
        $title = trans('admin.weights');
        return view('admin.weights.index', compact('Weights', 'title'));
    }


    public function create()
    {

        return view('admin.weights.create')->with('title', trans('admin.create_new_weight'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'weightname_ar'          => 'required',
            'weightname_en'          => 'required',

        ]);


        Weight::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('weights'));
    }

  
    public function edit($id)
    {
        $weight = Weight::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.weights.edit', compact('weight','title'));
    }

    public function update(Request $request, $id)
    {

            $data = $request->validate([
                'weightname_ar'          => 'required',
                'weightname_en'          => 'required',
    
            ]);

        Weight::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('weights'));
    }

 
    public function destroy($id)
    {
        Weight::find($id)->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('weights'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                Weight::find($id)->delete();
            }

        }else{

            Weight::find($id)->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('weights'));
        
    }

}
