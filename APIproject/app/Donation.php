<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'ref_number', 'user_id', 'order_id', 'charity_id', 'status'
    ];

    /**
     * Relation with user model
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relation with charity model
     */
    public function charity()
    {
        return $this->belongsTo('App\Charity');
    }

    /**
     * Relation with user model
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
