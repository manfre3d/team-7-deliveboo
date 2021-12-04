<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantType extends Model
{
    protected $fillable = [
        'name','slug'
    ];

    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}
