<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\RestaurantType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function type($list_type_id)
    {
        $list_type_id = explode("-", $list_type_id);

        foreach ($list_type_id as $type_id) 
        {
            $typeIdExists = RestaurantType::find($type_id);            
            
            if ( $typeIdExists == null ) 
            {   // tipologia non esiste => restituisco un data vuoto
                return response()->json([
                    'success' => true,
                    'data' => []
                ]);
            }
        }

        // filtro per la prima tipologia
        $restaurants = RestaurantType::find($list_type_id[0])->users()->get();     
        
        foreach ($restaurants as $index => $user_id) 
        {   // prendo per ogni ristorante le tipologie associate
            $pivot = DB::table('user_restaurant_type')->where('user_id', $user_id->id)->get();    

            // aggiungo tutti le tipologie ai ristoranti
            $list_restaurant_types = [];
            foreach ($pivot as $elm) 
            {
                $list_restaurant_types[] = $elm->restaurant_type_id;
            }
            $restaurants[$index]->types = $list_restaurant_types;
        }
        
        $filtered_restaurants = [];
        // ciclo sui ristoranti tenendo solo quelli con tutte le tipologie che mi servono
        foreach ($restaurants as $key => $restaurant) 
        {
            $are_types_correct = true;

            foreach ($list_type_id as $type_id) 
            {
                if ( !in_array( $type_id, $restaurant->types ) )
                {
                    $are_types_correct = false;
                }
            }

            if ( $are_types_correct ) 
            {
                unset($restaurant->pivot);
                $filtered_restaurants[] = $restaurant;
            }
        }

        return response()->json([
            'success' => true,
            'data' => $filtered_restaurants
        ]);
    }
}   
