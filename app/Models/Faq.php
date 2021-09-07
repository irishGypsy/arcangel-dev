<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
     /* @var string
     */
    protected $table = 'faqs';

    /**
     * @var array
     */
    protected $fillable = [
        'question','answer','status'
    ];
    protected $status = [
        'active' => 'Active',
        'inactive' => 'Inactive'
    ];

    public function getStatus()
    {
        return $this->status;
    }
}
