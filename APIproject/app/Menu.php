<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'restaurant_id', 'details', 'price', 'image', 'status', 'ratings',
    ];

    /**
     * Return the sluggable configuration for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Relation with user model
     */
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    /**
     * Relation with order model
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_menu')->withPivot('quantity');
    }

    public function orderMenu()
    {
        return $this->hasMany('App\OrderMenu');
    }
}
