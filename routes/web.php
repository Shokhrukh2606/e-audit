<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	return view('welcome');
});

function generate_view_form($path, $controller, $method){
	$router = app()->make('router');
	$salt=substr($path, 1);
	$router->get($path, "$controller"."@"."$method")->name("get_$salt");
	$router->post($path,  "$controller"."@"."$method")->name("post_$salt");
	return $router;
}
Route::namespace('App\Http\Controllers')->group(function () {
	/*==========public routes=============*/
	// show register form of all type of users
	// view: register.show
	Route::get("/register", "RegisterController@show")->name("show_register");
	// registration endpoint for user and agent
	// no view
	Route::post("/reg_cust", "RegisterController@reg_cust")->name("reg_cust");
	Route::post("/reg_agent", "RegisterController@reg_agent")->name("reg_agent");

	/*==========Agent routes=================*/
	Route::prefix('agent')->group(function(){
		Route::get("/hello", "Agent_Controller@hello");
	});
	/*==========AAC routes=================*/
	Route::prefix('aac')->group(function(){
		generate_view_form('/checkfunds', 'AAC_Controller', 'checkfunds');
		Route::get("/", "@checkfunds")->name('checkfunds');
	});
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



