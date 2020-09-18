<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'mobile', 'email', 'password',
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
     * Relation with restaurant model
     * name should have been in singular as it's one to one relationship
     * but it would imply changing the entire site where relation is used
     */
    public function restaurants()
    {
        return $this->hasOne('App\Restaurant');
    }

    /**
     * Relation with charity model
     */
    public function charity()
    {
        return $this->hasOne('App\Charity');
    }

    /**
     * Relation with donation model
     */
    public function donations()
    {
        return $this->hasMany('App\Donation');
    }
}


