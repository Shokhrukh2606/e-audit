<?php
/*==========Auditor routes=================*/
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


// send to customer with error
// no view
Route::post("send_with_errors/{id}", "Audit_Controller@send_with_errors")->name("send_with_errors");


// confirm
// no view
Route::get("confirm/{id}", "Audit_Controller@confirm")->name("confirm");


?>