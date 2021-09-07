<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{


    protected $table = 'referrals';

    protected $fillable = [
        'affiliate_name','total','commission','status','paid','created_at'
    ];

}
