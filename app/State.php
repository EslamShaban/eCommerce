<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
         
    protected $table = 'states';

    protected $fillable = [

        'statename_ar',
        'statename_en',
        'country_id',
        'city_id',
    ];

    public function country(){
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

    public function city(){
        return $this->belongsTo('App\City', 'city_id', 'id');
    }
}
