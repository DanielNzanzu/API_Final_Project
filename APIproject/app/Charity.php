<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ref_number', 'name', 'user_id', 'address', 'phone', 'website', 'email', 'details', 'status'
    ];


    /**
     * Relation with user model
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relation with donation model
     */
    public function donations()
    {
        return $this->hasMany('App\Donation');
    }
}
