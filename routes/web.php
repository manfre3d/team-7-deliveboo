<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Rotte Autenticazione
Auth::routes();

// Rotte area Admin
// con questo tipo di rotta, si sta impostando un prefisso admin
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/grafici-ordini/{year}', 'HomeController@orderCharts')->name('grafici-ordini');
    Route::resource('orders', 'OrderController');
    Route::resource('plates', 'PlateController');
});

// Rotte pubbliche
// pagamento
Route::get('/checkout', 'PageController@checkout');
Route::post('/checkout_process', 'PaymentsController@payment');
// 
Route::get('/{any}', 'PageController@index')->where('any', '.*');
// Route::get('/', 'PageController@index');