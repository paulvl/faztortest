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
    	'discount' => '-5%'
    ]);
});

Route::get('/case1', function () {
    \Cart::addCoupon([
        'id'        => "ABC123",
        'name'      => "10% en Zapatillas",
        'code'      => "ABC123",
        'discount'  => "-10%",
    ]);
    return "se ha agregado un cupon al carro";
});

Route::get('/case2', function () {
    \Cart::clear();
    return "se ha borrado la sesion";
});

Route::get('/case3', function () {
    \Cart::addOtherCharge([
        'id' => 12213,
        'name' => 'shipping',
        'amount' => 23,
    ]);
    return "se ha agregado el cargo";
});

Route::get('/case4', function () {
    return dd(\Cart::total(true));
});
