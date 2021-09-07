<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CountryCode extends Model
{

    /**
     * @var string
     */
    protected $table = 'country_codes';

    /**
     * @var string[]
     */
    protected $fillable = [
        'code','country','status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function affiliates()
    {
        return $this->hasMany(Affiliate::class);
    }

}
