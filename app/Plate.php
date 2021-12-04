<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        'name','description','ingredients','price','availability', 'plate_type_id', 'img_path'
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
