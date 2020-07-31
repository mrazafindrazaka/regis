<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/quittance', 'QuittanceController@index')->name('quittance');
Route::get('/quittance/create', 'QuittanceController@create')->name('quittance_create');
Route::get('/quittance/details/{id}', 'QuittanceController@detail_info')->name('quittance_details');

Route::post('/quittances', 'QuittanceController@create_recu');
Route::put('/quittances/{id}', 'QuittanceController@update_recu')->where('id', '[0-9]+');
Route::delete('/quittances/{id}', 'QuittanceController@delete_recu')->where('id', '[0-9]+');
Route::get('/quittances', 'QuittanceController@get_all');
Route::get('/quittances/{id}', 'QuittanceController@get_info')->where('id', '[0-9]+');

Route::get('/facture', 'FactureController@index')->name('facture');
Route::get('/facture/create', 'FactureController@create')->name('facture_create');
Route::get('/facture/details/{id}', 'FactureController@detail_info')->name('facture_details');

Route::post('/factures', 'FactureController@create_facture');
Route::put('/factures/{id}', 'FactureController@update_facture')->where('id', '[0-9]+');
Route::delete('/factures/{id}', 'FactureController@delete_facture')->where('id', '[0-9]+');
Route::get('/factures', 'FactureController@get_all');
Route::get('/factures/{id}', 'FactureController@get_info')->where('id', '[0-9]+');

Route::get('/user', 'AdminController@index')->name('user');
Route::get('/user/create', 'AdminController@create')->name('user_create');

Route::post('/users', 'AdminController@create_user');
Route::delete('/users/{id}', 'AdminController@delete_user')->where('id', '[0-9]+');
Route::get('/users', 'AdminController@get_all');

Route::get('/test', 'HomeController@test');
