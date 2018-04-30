<?php

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

Route::get('/', function () {
    return view('welcome');
});
//Customer listing
Route::get('customers', 'customersController@index');
//Customer adding screen
Route::get('customer', function(){
    return view('customer');
});
//Customer store
Route::post('customeradd', 'customersController@add');
//Customer edit screen
Route::get('customer/{customerid}', 'customersController@edit');
//customer update
Route::post('customerupdate', 'customersController@update');
//customer delete
Route::get('customerdelete/{customerid}', 'customersController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
