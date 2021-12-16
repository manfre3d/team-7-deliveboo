<?php

namespace App\Http\Controllers\Api;

use App\Plate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlatesController extends Controller
{
    public function index($user_id)
    {
        $plates = Plate::where('user_id', $user_id)->get();

        $available_plates = [];
        foreach ($plates as $key => $plate) 
        {
            if ( $plate->availability )
            {
                $available_plates[] = $plate;
            }
        }

        return response()->json([
            'success' => true,
            'data' => $available_plates
        ]);
    }
}
