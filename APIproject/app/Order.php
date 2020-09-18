<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'ref_number', 'user_id', 'restaurant_id', 'subtotal',
        'delivery', 'total', 'is_donation', 'status'
    ];

    /**
     * Relation with user model
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relation with restaurant model
     */
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    /**
     * Relation with menu model
     */
    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'order_menu')->withPivot('quantity');
    }

    /**
     * Relation with donation model
     */
    public function donation()
    {
        return $this->hasOne('App\Donation');
    }
}
