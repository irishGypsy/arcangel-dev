<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatteryFinders extends Model
{
    /* @var string
     */
    protected $table = 'battery__finders';

    /**
     * @var array
     */
    protected $fillable = [
        'year', 'make', 'model', 'engine_name', 'group_name', 'status'
    ];
    protected $status = [
        'activated' => 'Activated',
        'deactivated' => 'Deactivated'
    ];

    public function getStatus()
    {
        return $this->status;
    }
}
