<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Storage;
use Up;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $title = trans('admin.products');
        return view('admin.products.index', compact('products', 'title'));
    }


    public function create()
    {
        $product = Product::create(['title' => '']);

        if(!empty($product)){
            return redirect(aurl('products/' . $product->id . '/edit'));
        }
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'Productname_ar'        => 'required',
            'Productname_en'        => 'required',
            'mob'                   => 'required',
            'currency'              => 'required',
            'code'                  => 'required',
            'logo'                  => 'required|image|mimes:jpg,png,jpeg,gif'
        ],[],['logo' => trans('admin.Product_logo')]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'products',
                'upload_type'   => 'single',
                'delete_file'   => ''
            ]);
        }


        Product::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('products'));
    }

  
    public function edit($id)
    {
        $Product = Product::where('id', $id)->first();
        $title = trans('admin.create_or_edit_product', ['title' => $Product->title]);
        return view('admin.products.product', compact('Product', 'title'));

    }

    public function update_product_image($id)
    {
        
        $product = Product::where('id', $id)->update([
            'photo' =>  Up::uploadFile([
                'new_name'      =>'',
                'file'          => 'file',
                'path'          => 'products/' . $id,
                'upload_type'   => 'single',
                'delete_file'   => ''
            ]),
        ]);

        return response(['status' => true], 200);

    }

    public function delete_product_image($id)
    {
        $product = Product::find($id);
        Storage::delete($product->photo);
        $product->photo = '';
        $product->save();
        
    }

    public function upload_file($id){
        
        if(request()->hasFile('file')){

            $fid = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'file',
                'path'          => 'products/'. $id,
                'upload_type'   => 'files',
                'delete_file'   => '',
                'relation_id'   => $id,
                'file_type'     => 'product'
            ]);

            return response(['status' => true, 'id' => $fid], 200);
        }
       
    }

    public function delete_file()
    {
        if(request()->has('id')){

            Up::deleteFile(request('id'));

       }
    }



    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Productname_ar'        => 'required',
            'Productname_en'        => 'required',
            'currency'              => 'required',
            'mob'                   => 'required',
            'code'                  => 'required',
            'logo'                  => 'image|mimes:jpg,png,jpeg,gif'
        ],[],['logo' => trans('admin.Product_logo')]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'products',
                'upload_type'   => 'single',
                'delete_file'   => Product::find($id)->logo
            ]);
        }


        Product::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('products'));
    }

 
    public function destroy($id)
    {
        $Product = Product::find($id);
        Storage::delete($Product->logo);

        $Product->delete();

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('products'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $Product = Product::find($id);
                Storage::delete($Product->logo);
        
                $Product->delete();
            }

        }else{

            $Product = Product::find(request('item'));
            Storage::delete($Product->logo);
    
            $Product->delete();

        }
        
        
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('products'));
        
    }

}
