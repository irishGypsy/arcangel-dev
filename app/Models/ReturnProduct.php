<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
/**
* @var string
*/
protected $table = 'return_products';

/**
* @var array
*/
protected $fillable = [
'user_id','order_id', 'product_name', 'reason','status'
];

///**
// * @var array
// */
//protected $status = [
//'active' => 'Active',
//'inactive' => 'Inactive'
//];

public function getStatus()
{
return $this->status;
}

public function users()
{
    return $this->belongsTo(User::class);
}

public function orders()
{
    return $this->hasOne(Order::class);
}

/**
 * @return \Illuminate\Database\Eloquent\Relations\belongsTo
 */
public function product()
{
    return $this->belongsTo(Product::class);
}

}
