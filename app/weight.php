<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weight extends Model
{

    protected $table = 'weights';

    protected $fillable = [
        'weightname_ar',
        'weightname_en'
    ];
}
