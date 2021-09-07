<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatteryGroup extends Model
{
    /**
     * @var string
     */
    protected $table = 'battery_groups';

    /**
     * @var array
     */
    protected $fillable = ['material_name', 'material_code','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
