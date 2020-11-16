<?php

Route::get('/', function () {
	return redirect()->route('login');
})->name('home');

Route::get('/register', function () {
	return redirect()->route('show_register');
})->name('register');


?>