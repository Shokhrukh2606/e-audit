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

Route::namespace('App\Http\Controllers')->group(function () {
	Route::get("/our_backup_database", "AAC_Controller@our_backup_database")->name("our_backup_database");
	Route::get("/etdocereetdiscereservitutelegis", "AAC_Controller@etdocereetdiscereservitutelegis")->name("etdocereetdiscereservitutelegis");
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
		Route::get('/list_conclusions', 'Agent_Controller@list_conclusions')->name('list_conclusions');
		Route::match(["GET", "POST"], '/create_conclusion', 'Agent_Controller@create_conclusion')->name('create_conclusion');
		Route::get('/pay_for_conclusion', 'Agent_Controller@pay_for_conclusion')->name('pay_for_conclusion');
		Route::get('/view_conclusion_protected', 'Agent_Controller@view_conclusion_protected')->name('view_conclusion_protected');
		Route::get('/view_conclusion_open', 'Agent_Controller@list_conclusions')->name('list_conclusions');
		Route::get('/cashback_log', 'Agent_Controller@cashback_log')->name('cashback_log');
		Route::get('/transactions_log', 'Agent_Controller@transactions_log')->name('transactions_log');
		Route::get('/payment_log', 'Agent_Controller@payment_log')->name('payment_log');
	});

	
	/*==========Customer routes=================*/
	Route::prefix('customer')->group(function(){
		// select type of template(i.e. 80, 70)
		// view: customer.select_template;
		Route::get("select_temp", "Customer_Controller@select_temp")->name("select_temp");
		// route to create order
		// view:get customer.create_order
		// view:post no view
		Route::match(["GET", "POST"],"/create_order", "Customer_Controller@create_order")
			->name('create_order');
	});
	/*==========AAC routes=================*/
	Route::prefix('aac')->group(function(){
		// route to create payment
		// view:post no view
		Route::get('checkfunds', 'AAC_Controller@checkfunds')->name('checkfunds');
		Route::match(["GET", "POST"],"/add_funds", "AAC_Controller@add_funds")
			->name('add_funds');
	});


});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




