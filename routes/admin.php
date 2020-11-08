<?php
/*===============Admin routes==================*/
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

Route::match(["GET", "POST"], "/view_user/{id}", "Admin_Controller@view_user")
->name("view_user");

Route::match(["GET", "POST"], "/create_user", "Admin_Controller@create_user")
->name('create_user');
			// add funds to user
			// view: admin.add_funds

/*temporarily commented, payment table was renamed*/
// Route::match(["GET", "POST"], "/add_funds", "Admin_Controller@add_funds")
// ->name('add_funds');

?>