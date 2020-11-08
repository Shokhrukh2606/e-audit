<?php
/*==========Agent routes=================*/

Route::get('/list_conclusions', 'Agent_Controller@list_conclusions')->name('list_conclusions');

Route::match(["GET", "POST"], '/create_conclusion', 'Agent_Controller@create_conclusion')->name('create_conclusion');

Route::get('/pay_for_conclusion', 'Agent_Controller@pay_for_conclusion')->name('pay_for_conclusion');

Route::get('/view_conclusion_protected', 'Agent_Controller@view_conclusion_protected')->name('view_conclusion_protected');

Route::get('/view_conclusion_open/{id}', 'Agent_Controller@view_conclusion_open')->name('view_conclusion_open');

Route::get('/cashback_log', 'Agent_Controller@cashback_log')->name('cashback_log');

Route::get('/transactions_log', 'Agent_Controller@transactions_log')->name('transactions_log');

Route::get('/payment_log', 'Agent_Controller@payment_log')->name('payment_log');


?>