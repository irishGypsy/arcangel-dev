<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var array
     */
    protected $fillable = [
        'title','excerpt','body','slug','keywords','image','menu_placement','status'
    ];
    protected $status = [
        'header' => 'Header',
        'footer' => 'Footer'
    ];

    public function getStatus()
    {
        return $this->status;
    }
}
