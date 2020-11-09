<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $table = 'trademarks';

    protected $fillable = [

        'tradmarkname_ar',
        'tradmarkname_en',
        'logo',
    ];

}
