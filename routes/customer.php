<?php

/*==========Customer routes=================*/

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
Route::get("orders/{status}", "Customer_Controller@orders")->name("orders");

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


			// resend order
			// no view
Route::get("resend/{id}", "Customer_Controller@resend")->name("resend");

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
			// transactions
			// log
Route::get("transactions_log", "Customer_Controller@transactions_log")->name("transaction_log");

Route::post('reject_conc',"Customer_Controller@reject_conc")->name("reject_conc");


Route::get('contracts', 'Customer_Controller@contracts')->name('contracts');
?>