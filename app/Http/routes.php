<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/casex', function () {
	return dd(\Cart::all());
});

Route::get('/case0', function () {
    \Cart::add([
    	'id' => 1231,
    	'name' => 'Zapatillas',
    	'quantity' => 12,
    	'price' => 110,
    	'tax' => '10%',
    	'discount' => '-10%'
    ]);
});

Route::get('/case1', function () {
    \Cart::remove(1231, 6);
    return "se ha borrado la sesion";
});

Route::get('/case2', function () {
    \Cart::clear();
    return "se ha borrado la sesion";
});

Route::get('/case3', function () {
    return dd(\Cart::total(true));
});
