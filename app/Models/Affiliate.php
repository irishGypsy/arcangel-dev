<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class Affiliate extends Authenticatable
{
    use Notifiable, \Illuminate\Auth\MustVerifyEmail;

    /**
     * @var string
     */
    protected $table = 'affiliates';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
      'username','fname','lname','email','status','countrycode_id','commission','bank_details','comm_in_per','created_at','password'
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->fname.' '.$this->lname;
    }

    public function getSinceAttribute()
    {
        return $this->created_at->format('M d, Y');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country_codes()
    {
        return $this->hasOne(CountryCode::class);
    }

}
