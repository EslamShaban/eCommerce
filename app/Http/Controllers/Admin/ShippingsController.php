<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shipping;
use App\User;
use Storage;
use Up;

class ShippingsController extends Controller
{

    public function index()
    {
        $shippings = Shipping::all();
        $title = trans('admin.shippings');
        return view('admin.shippings.index', compact('shippings', 'title'));
    }


    public function create()
    {
        $users = User::where('level', 'company')->pluck('name','id');
        return view('admin.shippings.create')->with([
                                            'title'     =>trans('admin.create_new_shipping'),
                                            'users' => $users
                                        ]);
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'shippingname_ar'       => 'required',
            'shippingname_en'       => 'required',
            'user_id'               => 'required' ,                  
            'lng'                   => 'sometimes|nullable',
            'lat'                   => 'sometimes|nullable',
            'logo'                  => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif'

        ]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'shippings',
                'upload_type'   => 'single',
                'delete_file'   => ''
            ]);
        }


        Shipping::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('shippings'));
    }

  
    public function edit($id)
    {
        $shipping = Shipping::where('id', $id)->first();
        $users = User::where('level', 'company')->pluck('name','id');
        $title = trans('admin.edit_admin');
        return view('admin.shippings.edit', compact('shipping', 'users', 'title'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'shippingname_ar'       => 'required',
            'shippingname_en'       => 'required',
            'user_id'               => 'required|numeric' ,                  
            'lng'                   => 'sometimes|nullable',
            'lat'                   => 'sometimes|nullable',
            'logo'                  => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif'

        ]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'shippings',
                'upload_type'   => 'single',
                'delete_file'   => Shipping::find($id)->logo
            ]);
        }


        Shipping::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('shippings'));
    }

 
    public function destroy($id)
    {
        $Shipping = Shipping::find($id);
        Storage::delete($Shipping->logo);

        $Shipping->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('shippings'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $Shipping = Shipping::find($id);
                Storage::delete($Shipping->logo);
        
                $Shipping->delete();
            }

        }else{

            $Shipping = Shipping::find(request('item'));
            Storage::delete($Shipping->logo);
    
            $Shipping->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('shippings'));
        
    }

}
