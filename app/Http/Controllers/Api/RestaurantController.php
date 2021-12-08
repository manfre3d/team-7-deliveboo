<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\RestaurantType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = User::all();

        return response()->json([
            'success' => true,
            'data' => $restaurants
        ]);
    }

    public function show($slug)
    {
        // restituisco il singolo ristorante che corrisponde allo slug
        $restaurant = User::where('slug', $slug)->first();

        if ( is_null($restaurant) ) 
        {
            $restaurant = 'no results found';
        }

        return response()->json([
            'success' => true,
            'data' => $restaurant
        ]);
    }

    public function type($type_id)
    {
        $typeIdExists = RestaurantType::find($type_id);

        if ( $typeIdExists ) 
        {
            // filtro i ristoranti che hanno quella tipologia passando per la pivot
            $filteredRestaurants = RestaurantType::find($type_id)->users()->get();            
        }
        else 
        {
            $filteredRestaurants = 'no results found';
        }

        return response()->json([
            'success' => true,
            'data' => $filteredRestaurants
        ]);
    }
}
