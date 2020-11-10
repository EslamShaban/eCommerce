<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    protected $table = 'colors';

    protected $fillable = [
        'colorname_ar',
        'colorname_en',
        'color',
    ];
}
