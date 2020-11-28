<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\OtherData;
use App\Mall_Product;
use App\Size;
use App\Weight;
use App\Color;
use App\Trademark;
use App\Manufactory;
use App\File;
use App\RelatedProduct;
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

    public function size_weight()
    {
        if(request()->ajax() && request()->has('dep_id')){

            $size_name      = 'sizename_'.session('lang');
            $weight_name    = 'weightname_'.session('lang');
            $color_name     = 'colorname_'.session('lang');
            $trademark_name = 'tradmarkname_'.session('lang');
            $manufact_name  = 'manufactoryname_'.session('lang');

            $dep_list = array_diff(explode(',', get_parent(request('dep_id'))), [request('dep_id')]);

            $sizes   = Size::where('is_public', 'yes')->whereIn('department_id', $dep_list)->orwhere('department_id', request('dep_id'))->pluck($size_name, 'id');

            $weights            = Weight::pluck($weight_name, 'id');
            $colors             = Color::pluck($color_name, 'id');
            $trademarks         = Trademark::pluck($trademark_name, 'id');
            $manufactories      = Manufactory::pluck($manufact_name, 'id');

            $Product = Product::where('id', request('product_id'))->first();
            
            return view('admin.products.ajax.shipping_info', compact('sizes', 'weights', 'colors', 'trademarks', 'manufactories', 'Product'))->render();

        }else{
            return trans('admin.choose_department');
        }
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

    public function copy_product($product_id)
    {
        $product = Product::find($product_id);
        $copy = Product::find($product_id)->toArray();

        unset($copy['id']);
        
        $createCopyProduct = Product::create($copy);

        if(!empty($copy['photo'])){

            $ext = \File::extension($copy['photo']);
            $new_path= 'products/' . $createCopyProduct->id . '/' . \Str::random(30) . '.' . $ext;
            Storage::copy($copy['photo'], $new_path);
            $createCopyProduct->photo = $new_path;
            $createCopyProduct->save();
               
        }

        $files = File::where('file_type', 'product')->where('relation_id', $product_id)->get();

        if(!empty($files)){
            foreach($files as $file){
                $hashname = \Str::random(30);
                $ext = \File::extension($file->full_path);
                $new_file_path ='products/' . $createCopyProduct->id . '/' . $hashname . '.' . $ext;
                Storage::copy($file->full_path, $new_file_path);
                $add = File::create([
                    'name'          => $file->name,
                    'size'          => $file->size ,
                    'file'          => $hashname.'.'.$ext,
                    'path'          => 'products/' . $createCopyProduct->id,
                    'full_path'     => $new_file_path,
                    'mime_type'     => $file->mime_type,
                    'file_type'     => 'product',
                    'relation_id'   => $createCopyProduct->id
                ]);
            }
        }

        foreach($product->malls()->get() as $mall){
            Mall_Product::create([
                'product_id'    => $createCopyProduct->id,
                'mall_id'       => $mall->mall_id,
            ]);
        }

        
        foreach($product->other_data()->get() as $other_data){
            OtherData::create([
                'product_id'    => $createCopyProduct->id,
                'data_key'      => $other_data->data_key,
                'data_value'    => $other_data->data_value
            ]);
    }

        return response(['status' => true, 'success' => trans('admin.copied_successfuly'), 'id' => $createCopyProduct->id], 200);
        
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title'                 => 'required',
            'content'               => 'required',
            'department_id'         => 'required|numeric',
            'trademark_id'          => 'required|numeric',
            'manufact_id'           => 'required|numeric',
            'color_id'              => 'sometimes|nullable|numeric',
            'size'                  => 'sometimes|nullable',
            'size_id'               => 'sometimes|nullable|numeric',
            'currency_id'           => 'sometimes|nullable|numeric',
            'price'                 => 'required|numeric',
            'stock'                 => 'required|numeric',
            'start_at'              => 'required|date',
            'end_at'                => 'required|date',
            'start_offer_at'        => 'sometimes|nullable|date',
            'end_offer_at'          => 'sometimes|nullable|date',
            'price_offer'           => 'sometimes|nullable|numeric',
            'weight'                => 'sometimes|nullable',
            'weight_id'             => 'sometimes|nullable|numeric',
            'status'                => 'sometimes|nullable|in:pending,active,refused',
            'reason'                => 'sometimes|nullable',

        ]);

        if(request()->has('mall')){

            
            Mall_Product::where('product_id', $id)->delete();

  
            foreach(request('mall') as $mall){
                Mall_Product::create([
                    'product_id'    => $id,
                    'mall_id'       => $mall,
                ]);

            }

        }


        if(request()->has('key') && request()->has('value')){

            
            OtherData::where('product_id', $id)->delete();

            $i=0;
  
            foreach(request('key') as $key){
                OtherData::create([
                    'product_id'    => $id,
                    'data_key'      => $key,
                    'data_value'    => request('value')[$i]
                ]);

                $i++;
            }

        }
                
        if(request()->has('related')){

            
            RelatedProduct::where('product_id', $id)->delete();

  
            foreach(request('related') as $related){
                RelatedProduct::create([
                    'product_id'            => $id,
                    'related_product'       => $related,
                ]);

            }

        }

        Product::where('id', $id)->update($data);

        return response(['status' => true, 'success' => trans('admin.edit_successfuly')], 200);
    }

    public function products_search()
    {
        if(request()->ajax()){

            if(!empty(request('search')) && request()->has('search')){

                $related_product = RelatedProduct::where('product_id', request('id'))->get(['related_product']);
                $products = Product::where('title', 'LIKE', '%'.request('search').'%')
                ->where('id', '!=', request('id'))
                ->whereNotIn('id', $related_product)
                ->limit(10)->get();

                return response([
                    'status'=>true, 
                    'result'=>count($products) > 0 ? $products : '',
                    'count'=>count($products)
                ],200);

            }

        }
    }
    public function deleteProduct($id)
    {
        $Product = Product::find($id);
        Storage::delete($Product->photo);
        Up::deleteProduct_files($Product->id);
        $Product->delete();
    }
    public function destroy($id)
    {
        $this->deleteProduct($id);

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('products'));
    }

    public function multi_delete()
    {
        
        if(is_array(request('item'))){

            foreach(request('item') as $id){

                $this->deleteProduct($id);
            }

        }else{

            $this->deleteProduct(request('item'));;

        }
             
        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('products'));
        
    }

}
