<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    //setting

    public function setting()
    {
        return view('admin.settings', ['title' => trans('admin.settings')]);
    }

    public function setting_save()
    {
        $data = request()->except('_token', '_method');
        
        Setting::where('id', 'desc')->update($data);

        session()->flash('success', trans('admin.edit_successfuly'));

        return redirect(aurl('settings'));    }
}
