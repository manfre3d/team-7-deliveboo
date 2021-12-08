<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RestaurantType;

class RestaurantCategoriesController extends Controller
{
    public function restaurantType()
    {
        $restaurant_types = RestaurantType::all();
        return response()->json([
            "success" => true,
            'data' => $restaurant_types
        ]);
    }
}
