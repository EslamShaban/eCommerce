<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';

    protected $fillable = [
        'shippingname_ar',
        'shippingname_en',
        'user_id',
        'lng',
        'lat',
        'logo'
    ];

    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

