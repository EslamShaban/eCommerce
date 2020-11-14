<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  

    protected $table = 'countries';

    protected $fillable = [

        'countryname_ar',
        'countryname_en',
        'mob',
        'code',
        'currency',
        'logo'

    ];
}
