<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_reviews';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id','user_id','title','description','rating','status'
    ];
    protected $status = [
        'active' => 'Active',
        'inactive' => 'Inactive'
    ];

    /**
     * @return  string[]
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
