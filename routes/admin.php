<?php

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function(){
   
    Config::set('auth.defines', 'admin');

    Route::get('login', 'AdminAuth@login');
    Route::post('login', 'AdminAuth@dologin');
    Route::get('forgot/password', 'AdminAuth@forgot_password');
    Route::post('forgot/password', 'AdminAuth@forgot_password_reset');
    Route::get('reset/password/{token}', 'AdminAuth@reset_password');
    Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');


    Route::group(['middleware' => 'admin:admin'], function(){


        Route::resource('admin', 'AdminController');
        Route::get('admin/destroy/all', 'AdminController@multi_delete');

        Route::resource('users', 'UserController');
        Route::get('users/destroy/all', 'UserController@multi_delete');

        Route::resource('countries', 'CountriesController');
        Route::get('countries/destroy/all', 'CountriesController@multi_delete');

        Route::resource('cities', 'CitiesController');
        Route::get('cities/destroy/all', 'CitiesController@multi_delete');

        Route::resource('states', 'StatesController');
        Route::get('states/destroy/all', 'StatesController@multi_delete');

        Route::resource('departements', 'DepartementsController');

        Route::resource('trademarks', 'TrademarksController');
        Route::get('trademarks/destroy/all', 'TrademarksController@multi_delete');

        Route::resource('manufactories', 'ManufactoriesController');
        Route::get('manufactories/destroy/all', 'ManufactoriesController@multi_delete');

        
        Route::resource('shippings', 'ShippingsController');
        Route::get('shippings/destroy/all', 'ShippingsController@multi_delete');

        Route::resource('malls', 'MallsController');
        Route::get('malls/destroy/all', 'MallsController@multi_delete');

        
        Route::resource('colors', 'ColorsController');
        Route::get('colors/destroy/all', 'ColorsController@multi_delete');


        Route::get('settings', 'SettingsController@setting');
        Route::post('settings', 'SettingsController@setting_save');


        Route::get('/',function(){
            return view('admin.home');
        });

        Route::any('logout', 'AdminAuth@logout');
        
    });

    
    Route::get('lang/{lang}', function($lang){

        session()->has('lang') ? session()->forget('lang') : '';
        $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();

    });

    
});