<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    
    protected $table = 'related_products';

    protected $fillable = [
        'product_id',
        'related_product',
    ];

    public function product()
    {
       return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
