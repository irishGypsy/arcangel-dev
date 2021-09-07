<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * @var string
     */
    protected $table = 'banners';

    /**
     * @var array
     */
    protected $fillable = [
        'title','image','status','description','url','status'
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
