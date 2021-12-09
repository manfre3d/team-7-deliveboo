<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 

class ImageController extends Controller
{
    public function index($img_name)
    {
        if (!Storage::exists('restaurant_covers/' . $img_name)) {
            abort(404);
        }

        return response()->file('storage/restaurant_covers/' . $img_name);
    }
}
