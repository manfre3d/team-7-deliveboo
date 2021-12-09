<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 

class ImageController extends Controller
{
    public function index($folder, $img_name)
    {

        if (!Storage::exists("{$folder}/{$img_name}")) {
            abort(404);
            
        }

        return response()->file("storage/{$folder}/{$img_name}");
    }
}
