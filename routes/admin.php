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
// change status of conclusion
// view: conclusions
Route::get('/change_status/{status}/{id}', 'Admin_Controller@change_status')->name('change_status');


Route::match(["GET", "POST"], "/view_user/{id}", "Admin_Controller@view_user")
	->name("view_user");

Route::match(["GET", "POST"], "/create_user", "Admin_Controller@create_user")
	->name('create_user');
// add funds to user
// view: admin.add_funds

/*temporarily commented, payment table was renamed*/
Route::match(["GET", "POST"], "/add_funds", "Admin_Controller@add_funds")
->name('add_funds');
Route::get("conclusion/{id}", "Admin_Controller@conclusion")->name("conclusion");
Route::get("user_conclusions/{type}/{id}", "Admin_Controller@user_conclusions")->name("user_conclusions");

Route::get('/view_conclusion/{id}', 'Admin_Controller@view_conclusion')->name('view_conclusion');

/**
 * route to create some blanks
 * get for showing post for saving
 */
Route::match(["GET", "POST"], "/create_blanks", "Admin_Controller@create_blanks")
	->name("create_blanks");

/**
 * route to assigning blanks to users
 * get for showing post for saving
 */
Route::match(["GET", "POST"], "/assign_blanks", "Admin_Controller@assign_blanks")
	->name("assign_blanks");


/**
 * Create audit info card
 */
Route::match(["GET", "POST"], "/create_a_c_i", "Admin_Controller@create_a_c_i")
	->name("create_a_c_i");

/**
 * List audit info card
 * 
 */

Route::get('/list_a_c_i', "Admin_Controller@list_a_c_i")->name('list_a_c_i');
/**
 * delete aci
 */
Route::get('/delete_a_c_i/{id}', "Admin_Controller@delete_a_c_i")->name('delete_a_c_i');

/**
 * make aci default
 */

Route::get('/default_a_c_i/{id}', 'Admin_Controller@default_a_c_i')->name('default_a_c_i');

/**
 * edit aci
 */

Route::post('/edit_a_c_i/{id}', 'Admin_Controller@edit_a_c_i')->name('edit_a_c_i');

/**
 *
 * list services
 * 
 */

Route::get('/list_services', 'Admin_Controller@list_services')->name('list_services');


/**
 *
 * edit_service
 */

Route::post('/edit_service/{id}', 'Admin_Controller@edit_service')->name('edit_service');

Route::get('/transactions_log/{id}', 'Admin_Controller@transactions_log')->name('transactions_log');

/**
 *
 * list_settings
 */
Route::get('/list_settings', 'Admin_Controller@list_settings')->name('list_settings');
/**
 *
 * view_setting
 */
Route::match(["GET", "POST"], "/view_setting/{id}", "Admin_Controller@view_setting")
	->name("view_setting");
/**
 *
 * view_setting
 */
Route::match(["GET", "POST"], "/create_setting", "Admin_Controller@create_setting")
	->name("create_setting");
/**
 *
 * list_blanks
*/
Route::get('/list_blanks', 'Admin_Controller@list_blanks')->name('list_blanks');
