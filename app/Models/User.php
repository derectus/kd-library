<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city_id', 'district_id', 'phone', 'address', 'zip', 'sex', 'birthdate', 'is_banned', 'is_admin', 'request_count'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * The many to one relation between city and user
     * @return HasOne
     */
    public function city()
    {
        return $this->hasOne('App\Models\City', 'city_id');
    }

    /**
     * The many to one relation between barrows and users
     * @return HasMany
     */
    public function barrow()
    {
        return $this->hasMany('App\Models\Barrow', 'user_id');
    }

    /**
     * The many to one relation between barrows and users
     * @return HasMany
     */
    public function logs()
    {
        return $this->hasMany('App\Models\Log');
    }
}
