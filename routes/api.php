<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// http://127.0.0.1:8000/api/menu
Route::get('/menu', 'Api\MenuController@menu')->name("api.menu");

// http://127.0.0.1:8000/api/restaurants
Route::get('/restaurants', 'Api\RestaurantController@restaurant')->name("api.restaurant");

// http://127.0.0.1:8000/api/categories
Route::get('/categories', 'Api\RestaurantCategoriesController@restaurantType')->name('api.restaurantCategory');
