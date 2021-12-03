<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "total_price",
        "customer_surname",
        "customer_email",
        "customer_phone_number",
        "customer_address",
    ];
    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function plates()
    {
        return $this->belongsToMany("App\Plate");
    }
}
