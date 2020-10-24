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


	/*==========Customer routes=================*/
	Route::prefix('customer')->group(function(){
		Route::name('customer.')->group(function(){

			// select type of template(i.e. 80, 70)
			// view: customer.select_template;
			Route::get("select_temp", "Customer_Controller@select_temp")->name("select_temp");
			// route to create order
			// view:get customer.create_order
			// view:post no view
			Route::match(["GET", "POST"],"/create_order", "Customer_Controller@create_order")
			->name('create_order');

			// order list
			// view: Customer.list_orders
			Route::get("orders", "Customer_Controller@orders")->name("orders");

			// view order
			// view: Customer.view_order
			Route::get("order_view/{id}", "Customer_Controller@order_view")->name("order_view");

			// edit order
			// view: Customer.edit_order
			Route::match(["GET", "POST"],"/edit_order/{id}", 
				"Customer_Controller@edit_order"
			)->name('edit_order');

			// send order
			// no view
			Route::get("send/{id}", "Customer_Controller@send")->name("send");

			// cancel_order
			// no view
			Route::get("cancel_order/{id}", "Customer_Controller@cancel_order")->name("cancel_order");


		});
	});
	/**===========File Class ======================**/
	// open file retriever
	// pass path in a query like route('file')."?path=".$path;
	Route::get('file', "FileController@open" )->name('file');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');





