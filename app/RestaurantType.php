<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantType extends Model
{
    public $table = 'restaurants_types';

    protected $fillable = [
        'name','slug'
    ];

    public function users()
    {
        return $this->belongsToMany("App\User", 'user_restaurant_type');
    }
}
