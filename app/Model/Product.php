<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table    = 'products';
    protected $fillable = [
        'product_name_ar',
        'product_name_en',
        'description_ar',
        'description_en',
        'add_by_ar',
        'add_by_en',
        'add_by_photo',
        'discount',
        'price_old',
        //--------------start virgin two
        'photo',
        'department_id',
        'trade_id',
        'manu_id',
        'flavor_id',
        'flavor',
        'color',
        'color_id',
        'size_id',
        'size',
        'currency_id',
        'price',
        'stock',
        'start_at',
        'end_at',
        'start_offer_at',
        'end_offer_at',
        'price_offer',
        'other_data',
        'weight',
        'weight_id',
        'status',
        'reason',

    ];

    public function other_data(){

        return $this->hasMany('App\Model\OtherData','product_id','id');
    }

    public function files()
    {
        return $this->hasMany('App\File','relation_id','id')->where('file_type','product');
    }
 
}
