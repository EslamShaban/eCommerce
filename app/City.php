<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
       
    protected $table = 'cities';

    protected $fillable = [

        'cityname_ar',
        'cityname_en',
        'country_id',

    ];

    public function country(){
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }
}
