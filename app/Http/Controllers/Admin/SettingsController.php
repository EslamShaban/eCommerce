<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Storage;
use Up;

class SettingsController extends Controller
{
    //setting

    public function setting()
    {
        return view('admin.settings', ['title' => trans('admin.settings')]);
    }

    public function setting_save()
    {
        /*

                'sitename_ar',
        'sitename_en',
        'logo',
        'icon',
        'email',
        'main_lang',
        'description',
        'keywords',
        'status',
        'message_maintenance'

        */

        $data =request()->validate([
            'sitename_ar'                   => '',
            'sitename_en'                   => '',
            'logo'                          => 'image|mimes:jpg,png,jpeg,gif',
            'icon'                          => 'image|mimes:jpg,png,jpeg,gif',
            'email'                         => '',
            'main_lang'                     => '',
            'description'                   => '',
            'keywords'                      => '',
            'status'                        => '',
            'message_maintenance'           => ''
        ]);

        if(request()->hasFile('logo')){

            $data['logo'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'logo',
                'path'          => 'settings',
                'upload_type'   => 'single',
                'delete_file'   => setting()->logo
            ]);
        }

        if(request()->hasFile('icon')){

            $data['icon'] = Up::uploadFile([
                'new_name'      => '',
                'file'          => 'icon',
                'path'          => 'settings',
                'upload_type'   => 'single',
                'delete_file'   => setting()->icon
            ]);
        }

        Setting::orderBy('id', 'desc')->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('settings'));    }
}
