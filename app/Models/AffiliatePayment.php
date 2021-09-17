<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatePayment extends Model
{

    protected $table = 'affiliate_payments';

    protected $fillable = [
        'affiliate_id','order_id','amount','paid_date','status'
    ];


}
