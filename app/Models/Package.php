<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $fillable = [
      'name','description','price_adjustment','status'
    ];

    public function batteryPackages()
    {
        return $this->hasMany(batteryPackages::class);
    }


}
