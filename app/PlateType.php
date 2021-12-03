<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlateType extends Model
{
    protected $fillable = [
        'name',
        'plate_type_id'
    ];
    public function plates()
    {
        return $this->hasMany("App\Plate");
    }
}
