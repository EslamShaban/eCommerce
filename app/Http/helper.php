<?php

if(! function_exists('setting')){
    function setting(){
        return App\Setting::orderBy('id', 'desc')->first();
    }
}

if(! function_exists('get_parent')){
    
    
    function get_parent($dep_id){
        $list_dep = [];

        $departement =  \App\Departement::find($dep_id);
        if($departement->parent !== null && $departement->parent > 0){
            return get_parent($departement->parent) . "," . $dep_id;
        }else{
            return $dep_id;
        }

    }
}           
             
if(! function_exists('check_mall')){
    
    function check_mall($mall_id, $product_id){
        return App\Mall_Product::where('product_id', $product_id)->where('mall_id', $mall_id)->count() > 0 ? true : false;
    }
}

if(! function_exists('load_dep')){
    function load_dep($select = null, $dep_hide = null){
        $departements =  \App\Departement::selectRaw('depname_'.session('lang').' as text' )
        ->selectRaw('id as id' )
        ->selectRaw('parent as parent' )
        ->get('text', 'id', 'parent');

        $dep_arr = [];

        foreach($departements as $departement){
            $list_arr = [];
            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];

            if($select !== null && $select == $departement->id ){

                $list_arr['state'] = [
                    'opened'    => true,
                    'selected'  =>true,
                    'disabled' =>false
                ];
            }

            if($dep_hide == $departement->id ){

                $list_arr['state'] = [
                    'opened'    => false,
                    'selected'  =>false,
                    'disabled' =>true,
                    'hidden' =>true

                ];
            }

            $list_arr['id']     = $departement->id;
            $list_arr['parent'] = $departement->parent !== null ? $departement->parent : '#';
            $list_arr['text']   = $departement->text;

            array_push($dep_arr, $list_arr);
        }

        return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
    }
}

if(! function_exists('aurl')){
    function aurl($url = null){
        return url('admin/' . $url);
    }
}

if(! function_exists('admin')){
    function admin(){
        return auth()->guard('admin');
    }
}

if(! function_exists('active_menu')){
    function active_menu($link){
        if(preg_match('/' . $link . '/i', Request::segment(2))){
            return['menu-open', 'active'];
        }else{
            return ['', ''];
        }
    }
}

if(! function_exists('lang')){

    function lang(){

        if(session()->has('lang')){
            return session('lang');
        }else{
            session()->put('lang', setting()->main_lang);
            return setting()->main_lang;
        }    
    }

}

if(! function_exists('direction')){

    function direction(){

        if(session()->has('lang')){
            if(session('lang') == 'ar')
                return 'rtl';
            else
                return 'ltr';
        }else{
            return 'ltr';
        }    
    }

}
