<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShippingInfo extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_shipping_infos';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id','length', 'width', 'height', 'weight', 'is_fragile', 'has_plug', 'power_plug', 'has_batteries', 'has_batteries_power', 'product_instructions', 'delivery_time', 'replacement_time',  'shipping_uk', 'shipping_europe', 'shipping_global',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }


}
