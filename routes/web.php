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

Route::get('report', 'FHouseController@report')
        ->middleware(['checksession']);
Route::get('transactions/{page?}', 'FHouseController@transactions')
        ->middleware(['checksession']);
Route::get('transaction/{transactionId}', 'FHouseController@singleTransaction')
        ->middleware(['checksession']);
Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('/main/logout', 'MainController@logout');