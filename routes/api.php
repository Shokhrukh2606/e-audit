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

// Intergration with click payment system
Route::prefix('click')->group(function(){
		// prepare api endpoint for click
	Route::post('prepare', "Click@prepare");
		// complete api endpoint for click		
	Route::post('complete', "Click@complete");
	// prepare api endpoint for click
});
Route::post('payme', "Payme@create");

// Route::prefix('payme')->group(function(){
// 	Route::post('create', "Payme@create");
// 	// complete api endpoint for click		
// 	Route::post('perform', "Payme@perform");
// });

?>