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
Route::view("conditions","conditions")->name("conditions");

Route::get('/dispatcher', function () {
	
	switch (auth()->user()->group->name) {
		case 'admin':
			return redirect()->route('admin.list_orders');
		break;
		case 'auditor':
			return redirect()->route('auditor.orders');
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
			// route to profile info
			// view:profile info
		Route::match(['GET', 'POST'],'/profile', 'AAC_Controller@profile')->name('profile');
		/*temporarily commented, because payment table was changing*/
		// Route::match(["GET", "POST"], "/add_funds", "AAC_Controller@add_funds")
		// ->name('add_funds');
		Route::get('fill_balance', 'AAC_Controller@fill_balance')->name('fill_balance');
		Route::get('certificates_list', 'AAC_Controller@certificates_list')->name('certificates_list');
	});
});

/**===========File Class ======================**/
	// open file retriever
	// pass path in a query like route('file')."?path=".$path;
Route::get('file', "FileController@open")->name('file');


/**===========Open QR code for conclusion ======================**/
	// open conclusion without auth
Route::get('open_conclusion/{id}', "RegisterController@open_conclusion")->name('open_conclusion');

