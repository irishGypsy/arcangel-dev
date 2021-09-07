<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * @var string
     */
    protected $table = 'colors';

    /**
     * @var array
     */
    protected $fillable = [
        'name','code','entry_by','status','ip_addr','rc','cca','capacity'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
