<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mall_Product extends Model
{
    protected $table = 'mall__products';
    
    protected $fillable = [
        'product_id',
        'mall_id'
    ];

    public function mall()
    {
       return $this->hasOne('App\Mall', 'id', 'mall_id');
    }
}
