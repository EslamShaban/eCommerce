<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $fillable = [
        'sizename_ar',
        'sizename_en',
        'is_public',
        'department_id'
    ];

    public function department(){
        
        return $this->belongsTo('App\Departement', 'department_id', 'id');
    }
}
