<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    /**
     * @var string
     */
    protected $table = 'capacities';

    /**
     * @var array
     */
    protected $fillable = [
        'capacity_name','capacity_code','status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
