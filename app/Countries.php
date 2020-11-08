<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    /* 
    
               $table->id();
            $table->string('countryname_ar');
            $table->string('countryname_en');
            $table->string('mob');
            $table->string('code');
            $table->string('logo');

    */

    protected $table = 'countries';

    protected $fillable = [

        'countryname_ar',
        'countryname_en',
        'mob',
        'code',
        'logo'

    ];
}
