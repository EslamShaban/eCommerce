<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'Maintenance'], function(){

    Route::get('/', function () {
        return view('front.home');
    });

});

Route::get('Maintenance', function () {

    if(setting()->status == 'open'){

        return redirect('/');

    }

    return view('front.maintenance');
});

