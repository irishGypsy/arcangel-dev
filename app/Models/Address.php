<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
      'billing_first_name','billing_last_name','billing_address','billing_city','billing_state_id','billing_zip','billing_countrycode_id','billing_phone_number','billing_email',
        'shipping_first_name','shipping_last_name','shipping_address','shipping_city','shipping_state_id','shipping_zip','shipping_countrycode_id','shipping_phone_number','shipping_email',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function state()
    {
        return $this->hasOne(StateCode::class);
    }

    public function country()
    {
        return $this->hasOne(CountryCode::class);
    }


}
