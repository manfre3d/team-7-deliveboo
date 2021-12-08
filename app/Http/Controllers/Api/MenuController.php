<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plate;

class MenuController extends Controller
{
    public function menu()
    {
        $plates = Plate::all();
        return response()->json([
            "success" => true,
            'data' => $plates
        ]);
    }
}
