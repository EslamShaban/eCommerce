<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    protected $table = 'malls';

    protected $fillable = [
        'mallname_ar',
        'mallname_en',
        'facebook',
        'twitter',
        'website',
        'contact_name',
        'email',
        'mobile',
        'address',
        'lng',
        'lat',
        'logo',
        'country_id'
    ];

    
    public function country(){
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }
}
