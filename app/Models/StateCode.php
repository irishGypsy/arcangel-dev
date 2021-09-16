<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateCode extends Model
{

    protected $table = 'state_codes';

    protected $fillable = [
        'abbreviation','state'

    ];


}
