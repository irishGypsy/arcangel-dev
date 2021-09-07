<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /**
     * @var string
     */
    protected $table = 'testimonials';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'slug', 'hot', 'status','image',  'meta_title', 'meta_description', 'meta_keyword'
    ];
    protected $status = [
        'active' => 'Active',
        'inactive' => 'Inactive'
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
