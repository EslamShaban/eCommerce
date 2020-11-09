<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufactory extends Model
{

    protected $table = 'manufactories';

    protected $fillable = [
        'manufactoryname_ar',
        'manufactoryname_en',
        'facebook',
        'twitter',
        'website',
        'contact_name',
        'email',
        'mobile',
        'address',
        'lng',
        'lat',
        'logo'
    ];
}
