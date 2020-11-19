<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/dispatcher', function () {
	
	switch (auth()->user()->group->name) {
		case 'admin':
			return redirect()->route('admin.list_orders');
		break;
		case 'auditor':
			return redirect()->route('auditor.conclusions');
		break;
		case 'agent':
			return redirect()->route('agent.list_conclusions');
		break;
		case 'customer':
			return redirect()->route('customer.orders','draft');
		break;

		default:
		return redirect()->route('home');
		break;
	}
})->name('dispatcher');


Route::get('/', function () {
	return redirect()->route('login');
})->name('home');

Route::get('/register', function () {
	return redirect()->route('show_register');
})->name('register');



/*==========public routes=============*/
	// show register form of all type of users
	// view: register.show
Route::get("/register", "RegisterController@show")->name("show_register");
	// registration endpoint for user and agent
	// no view
Route::post("/reg_cust", "RegisterController@reg_cust")->name("reg_cust");
Route::post("/reg_agent", "RegisterController@reg_agent")->name("reg_agent");

// verification code trigger

Route::get("/verification", "RegisterController@verification")->name("verification");
Route::match(['GET', 'POST'],"/forgot_pswrd", "RegisterController@forgot_pswrd")->name("forgot_pswrd");



/*==========AAC routes=================*/
Route::prefix('aac')->group(function () {
	Route::name('aac.')->group(function () {

			// route to create payment
			// view:post no view
		Route::get('checkfunds', 'AAC_Controller@checkfunds')->name('checkfunds');
		
		/*temporarily commented, because payment table was changing*/
		// Route::match(["GET", "POST"], "/add_funds", "AAC_Controller@add_funds")
		// ->name('add_funds');
	});
});

/**===========File Class ======================**/
	// open file retriever
	// pass path in a query like route('file')."?path=".$path;
Route::get('file', "FileController@open")->name('file');
