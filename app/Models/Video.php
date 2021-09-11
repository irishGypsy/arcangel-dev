<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'title','creator','post_date','host_site','length','url','embed_code','pinned','subtitle','description','status','thumbnail','file'
        ];

    protected $status = [
        'active' => 'Active',
        'inactive' => 'Inactive'
    ];

    protected $pinned = [
        '0' => 'No',
        '1' => 'Yes'
    ];


    public function getStatus()
    {
        return $this->status;
    }

    public function getPinned()
    {
        return $this->pinned;
    }

}
