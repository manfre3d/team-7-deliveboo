<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        'name','slug','description','ingredients','price','availability'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function orders()
    {
        return $this->belongsToMany("App\Order");
    }
    public function plateType()
    {
        return $this->belongsTo("App\PlateType");
    }
}
