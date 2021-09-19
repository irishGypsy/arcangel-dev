<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'capacity_id', 'batterygroup_id','countrycode_id','sku', 'name','init_quantity','min_quantity','popular', 'technical_specifications','price','shipping','warranty','ship_type','sales_applicable'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'sales_applicable' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function firstImage()
    {
//        $imageUrl = ProductImage::find()
        $i = DB::table('product_images')->where('product_id', $this->id)->first();
        if($i != NULL) {
            return $i->image;
        }
//        return $this;
//        return $this->hasMany(ProductImage::class)->first();

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function return_products()
    {
        return $this->hasMany(ReturnProduct::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function capacity()
    {
        return $this->belongsTo(Capacity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function batterygroup()
    {
        return $this->belongsTo(BatteryGroup::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function countrycode()
    {
        return $this->belongsTo(CountryCode::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function product_reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'productID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shippinginfo()
    {
        return $this->hasOne(ProductShippingInfo::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sale()
    {
        return $this->hasOne(Sale::class, 'productID');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

}
