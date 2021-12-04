<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantType extends Model
{
    protected $fillable = [
        'name','slug', 'img_path'
    ];

    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}
