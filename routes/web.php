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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('report', 'FHouseController@report');
Route::get('transactions', 'FHouseController@transactions');
Route::get('transaction/{transactionId}', 'FHouseController@singleTransaction');
Route::get('show/{id}', 'FHouseController@show');

Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('/main/logout', 'MainController@logout');