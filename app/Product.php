<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //title

    protected $table = 'products';

    protected $fillable = [
        'title',
        'content',
        'photo',
        'department_id',
        'trademark_id',
        'manufact_id',
        'color_id',
        'size_id',
        'currency_id',
        'other_data',
        'price',
        'stock',
        'start_at',
        'end_at',
        'start_offer_at',
        'price_offer',
        'end_offer_at',
        'weight',
        'weight_id',
        'status',
        'reason'
    ];

    public function files()
    {
       return $this->hasMany('App\File', 'relation_id', 'id')->where('file_type', 'product');
    }
}
