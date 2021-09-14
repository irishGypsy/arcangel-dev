<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_number', 'user_id', 'status', 'grand_total', 'item_count', 'payment_status', 'payment_method',
        'billing_first_name', 'billing_last_name', 'billing_address', 'billing_city', 'billing_country', 'billing_post_code', 'billing_phone_number',
        'shipping_first_name', 'shipping_last_name', 'shipping_address', 'shipping_city', 'shipping_country', 'shipping_post_code', 'shipping_phone_number', 'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function return_products()
    {
        return $this->hasMany(ReturnProduct::class);

    }

    public function countrycodes()
    {
        return $this->belongsTo(CountryCode::class);

    }
}
