<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlateType extends Model
{
    public $table = 'plates_types';
    
    protected $fillable = [
        'name'
    ];
    public function plates()
    {
        return $this->hasMany("App\Plate");
    }
}
