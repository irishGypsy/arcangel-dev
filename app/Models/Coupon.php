<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * @var string
     */
    protected $table = 'coupons';

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'start_date', 'end_date', 'discount', 'status', 'userId'
    ];
    protected $status = [
        'free' => 'Free',
        'used' => 'Used'
    ];

    public function getStatus()
    {
        return $this->status;
    }


//    public function setNameAttribute($value)
//    {
//        $this->attributes['name'] = $value;
//        $this->attributes['slug'] = str_slug($value);
//    }


}
