<?php
/*==========Agent routes=================*/

Route::get('/list_conclusions', 'Agent_Controller@list_conclusions')->name('list_conclusions');

Route::match(["GET", "POST"], '/create_conclusion', 'Agent_Controller@create_conclusion')->name('create_conclusion');

Route::get('/pay_for_conclusion', 'Agent_Controller@pay_for_conclusion')->name('pay_for_conclusion');

Route::get('/view_conclusion_protected', 'Agent_Controller@view_conclusion_protected')->name('view_conclusion_protected');


Route::get('/cashback_log', 'Agent_Controller@cashback_log')->name('cashback_log');

Route::get('/transactions_log', 'Agent_Controller@transactions_log')->name('transactions_log');

Route::get('/payment_log', 'Agent_Controller@payment_log')->name('payment_log');


    // create invoice
    // view: redirects to payment
Route::get("/create_invoice/{conclusion_id}", "Agent_Controller@create_invoice")->name("create_invoice");

			// pay
			// view: pay_for_order
Route::get("/pay/{invoice_id}", "Agent_Controller@pay")->name("pay");
Route::get('/view_conclusion_open/{id}', 'Agent_Controller@view_conclusion_open')->name('view_conclusion_open');
Route::get('/view_conclusion/{id}', 'Agent_Controller@view_conclusion')->name('view_conclusion');
// change status of conclusion
// view: conclusions
Route::get('/change_status/{status}/{id}', 'Agent_Controller@change_status')->name('change_status');
Route::match(["GET", "POST"],'/edit_conclusion/{id}', 'Agent_Controller@edit_conclusion')->name('edit_conclusion');
Route::match(["GET", "POST"],'/edit_conclusion/{id}', 'Agent_Controller@edit_conclusion')->name('edit_conclusion');

Route::post('assign_blank', "Agent_Controller@assign_blank")->name('assign_blank');
Route::post('break_all', "Agent_Controller@break_all")->name('break_all');

Route::get('resend/{id}', "Agent_Controller@resend")->name("resend");

Route::get('download_invoice/{conclusion_id}', "Agent_Controller@download_invoice")->name("download_invoice");
