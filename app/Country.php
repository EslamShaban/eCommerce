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

    public function malls(Type $var = null)
    {
        return $this->hasMany('App\Mall', 'country_id','id');
    }
}
