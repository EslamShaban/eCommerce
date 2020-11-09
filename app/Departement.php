<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{

    protected $table = 'departements';

    protected $fillable = [

        'depname_ar',
        'depname_en',
        'icon',
        'description',
        'keywords',
        'parent'

    ];

    public function parent(){
        return $this->hasMany('App\Departement', 'parent', 'id');
    }
}
