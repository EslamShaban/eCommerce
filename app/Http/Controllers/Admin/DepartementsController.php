<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departement;
use Storage;
use Up;

class DepartementsController extends Controller
{

    public function index()
    {
        return view('admin.departements.index')->with('title',trans('admin.departements'));

    }


    public function create()
    {
        return view('admin.departements.create')->with('title',trans('admin.create_new_dep'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'depname_ar'        => 'required',
            'depname_en'        => 'required',
            'parent'            => 'sometimes|nullable|numeric',
            'icon'              => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif',
            'description'       =>'sometimes|nullable',
            'keywords'          => 'sometimes|nullable'
        ]);

        if(request()->hasFile('icon')){

            $data['icon'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'icon',
                'path'          => 'departements',
                'upload_type'   => 'single',
                'delete_file'   => ''
            ]);
        }


        Departement::create($data);

        session()->flash('success', trans('admin.added_successfuly'));

        return redirect(aurl('departements'));
    }

  
    public function edit($id)
    {
        $departement = Departement::where('id', $id)->first();
        $title = trans('admin.edit_admin');
        return view('admin.departements.edit', compact('departement', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'depname_ar'        => 'required',
            'depname_en'        => 'required',
            'parent'            => 'sometimes|nullable|numeric',
            'icon'              => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif',
            'description'       =>'sometimes|nullable',
            'keywords'          => 'sometimes|nullable'
        ]);

        if(request()->hasFile('icon')){

            $data['icon'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'icon',
                'path'          => 'departements',
                'upload_type'   => 'single',
                'delete_file'   => Departement::find($id)->icon
            ]);
        }


        Departement::where('id', $id)->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('departements'));
    }

 
    public static function parent_delete($id)
    {
        $departements = Departement::where('parent', $id)->get();

        foreach($departements as $sub){

            self::parent_delete($sub->id);
        }
        
        $dep = Departement::find($id);

        if(! empty($dep->icon)){
            Storage::has($dep->icon) ? Storage::delete($dep->icon) : '';
        }

        $dep->delete();
    }
    public function destroy($id)
    {
        self::parent_delete($id);

        session()->flash('success', trans('admin.deleted_successfuly'));

        return redirect(aurl('departements'));
    }


}
