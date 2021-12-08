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

        if ( count($plates) == 0 ) 
        {
            $plates = 'no results found';
        }

        return response()->json([
            'success' => true,
            'data' => $plates
        ]);
    }
}
