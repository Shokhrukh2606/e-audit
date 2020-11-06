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
			return redirect()->route('customer.orders');
			break;

		default:
			return redirect()->route('home');
			break;
	}
})->name('dispatcher');


Route::get('/', function () {
	return view('welcome');
})->name('home');

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
	Route::prefix('agent')->group(function () {
		Route::name('agent.')->group(function () {
			Route::get('/list_conclusions', 'Agent_Controller@list_conclusions')->name('list_conclusions');
			Route::match(["GET", "POST"], '/create_conclusion', 'Agent_Controller@create_conclusion')->name('create_conclusion');
			Route::get('/pay_for_conclusion', 'Agent_Controller@pay_for_conclusion')->name('pay_for_conclusion');
			Route::get('/view_conclusion_protected', 'Agent_Controller@view_conclusion_protected')->name('view_conclusion_protected');
			Route::get('/view_conclusion_open/{id}', 'Agent_Controller@view_conclusion_open')->name('view_conclusion_open');
			Route::get('/cashback_log', 'Agent_Controller@cashback_log')->name('cashback_log');
			Route::get('/transactions_log', 'Agent_Controller@transactions_log')->name('transactions_log');
			Route::get('/payment_log', 'Agent_Controller@payment_log')->name('payment_log');
		});
	});


	/*==========Customer routes=================*/
	Route::prefix('customer')->group(function () {
		Route::name('customer.')->group(function () {

			// select type of template(i.e. 80, 70)
			// view: customer.select_template;
			Route::get("select_temp", "Customer_Controller@select_temp")->name("select_temp");
			// route to create order
			// view:get customer.create_order
			// view:post no view
			Route::match(["GET", "POST"], "/create_order", "Customer_Controller@create_order")
				->name('create_order');


			// order list
			// view: Customer.list_orders
			Route::get("orders", "Customer_Controller@orders")->name("orders");

			// view order
			// view: Customer.view_order
			Route::get("order_view/{id}", "Customer_Controller@order_view")->name("order_view");

			// edit order
			// view: Customer.edit_order
			Route::match(
				["GET", "POST"],
				"/edit_order/{id}",
				"Customer_Controller@edit_order"
			)->name('edit_order');

			// send order
			// no view
			Route::get("send/{id}", "Customer_Controller@send")->name("send");

			// cancel_order
			// no view
			Route::get("cancel_order/{id}", "Customer_Controller@cancel_order")->name("cancel_order");

			// one conclusion view protected
			// view: pdf
			Route::get("conclusion/{id}", "Customer_Controller@conclusion")->name("conclusion");

			// create invoice
			// view: redirects to payment
			Route::get("create_invoice/{conclusion_id}", "Customer_Controller@create_invoice")->name("create_invoice");

			// pay
			// view: pay_for_order
			Route::get("pay/{invoice_id}", "Customer_Controller@pay")->name("pay");


		});
	});

	/*==========Auditor routes=================*/
	Route::prefix('auditor')->group(function () {
		Route::name('auditor.')->group(function () {
			// select type of template(i.e. 80, 70)
			// view: auditor.select_template;
			Route::get("select_temp", "Audit_Controller@select_temp")->name("select_temp");
			// route to create conclusion
			// view:get auditor.create_order
			// view:post no view
			Route::match(["GET", "POST"], "/create_conclusion", "Audit_Controller@create_conclusion")
				->name('create_conclusion');

			// list conclusions of auditor
			// view: auditor.list_conclusions;
			Route::get("conclusions", "Audit_Controller@conclusions")->name("conclusions");

			// one conclusion view protected
			// view: auditor.view_conclusion;
			Route::get("conclusion/{id}", "Audit_Controller@conclusion")->name("conclusion");

			// send to customer
			// view: no view
			Route::get("send/{id}", "Audit_Controller@send")->name("send");

			// list orders of auditor
			// view: auditor.list_orders;
			Route::get("orders", "Audit_Controller@orders")->name("orders");

			// view order
			// view: auditor.view_order;
			Route::get("view_order/{id}", "Audit_Controller@view_order")->name("view_order");
			// write conclusion based on order
			// view: create_conc_on_order
			// POST: no view. 
			// hint: {id} on get means order id, on post it means cust_comp_info id
			Route::match(["GET", "POST"], "/create_conc_on_order/{id}", "Audit_Controller@create_conc_on_order")
				->name('create_conc_on_order');
		});
	});
	/*===============Admin routes==================*/
	Route::prefix('admin')->group(function () {
		Route::name('admin.')->group(function () {
			// all order
			// view: admin.list_orders
			Route::get("orders", "Admin_Controller@list_orders")->name("list_orders");
			// view order
			// view: admin.view_order
			Route::get("order/{id}", "Admin_Controller@order")->name("order");
			// assign auditor
			// view: no view
			Route::post("assign_order/{id}", "Admin_Controller@assign_order")->name("assign_order");
			// list conclusions
			// view: admin.conclusions
			Route::get("conclusions", "Admin_Controller@conclusions")->name("conclusions");
			// list users with filter
			// view: admin.conclusions
			Route::get("list_users", "Admin_Controller@list_users")->name("list_users");
			Route::match(["GET", "POST"], "/view_user/{id}", "Admin_Controller@view_user")->name("view_user");
			Route::match(["GET", "POST"], "/create_user", "Admin_Controller@create_user")
				->name('create_user');
			// add funds to user
			// view: admin.add_funds
			Route::match(["GET", "POST"], "/add_funds", "Admin_Controller@add_funds")
				->name('add_funds');
		});
	});
	/*==========AAC routes=================*/
	Route::prefix('aac')->group(function () {
		Route::name('aac.')->group(function () {

			// route to create payment
			// view:post no view
			Route::get('checkfunds', 'AAC_Controller@checkfunds')->name('checkfunds');
			Route::match(["GET", "POST"], "/add_funds", "AAC_Controller@add_funds")
				->name('add_funds');
		});
	});
	/**===========File Class ======================**/
	// open file retriever
	// pass path in a query like route('file')."?path=".$path;
	Route::get('file', "FileController@open")->name('file');
});
