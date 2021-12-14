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


Route::namespace('Api')->name('api.')->group(function() {
    // restituisce tutti i ristoranti
	Route::get('/restaurants', 'RestaurantController@index')->name("index");
    // restituisce i ristoranti che hanno la categoria con l'id passato
	Route::get('/restaurants/type/{list_type_id}', 'RestaurantController@type');
    // restituisco il singolo ristorante
	Route::get('/restaurants/{slug}', 'RestaurantController@show');

    // restituisco lista piatti per singolo ristorante
	Route::get('/plates/{user_id}', 'PlatesController@index');

    // restituisco un'immagine 
	Route::get('/image/{folder}/{img_name}', 'ImageController@index');
  
    // restituisco tutte le categorie di ristorante 
    Route::get('/categories', 'RestaurantCategoriesController@restaurantType')->name('api.restaurantCategory');
});
