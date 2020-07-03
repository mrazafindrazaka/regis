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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@create')->name('create');
Route::get('/details/{id}', 'HomeController@detail_info')->name('details');
Route::post('/infos', 'HomeController@create_recu');
Route::put('/infos/{id}', 'HomeController@update_recu')->where('id', '[0-9]+');
Route::delete('/infos/{id}', 'HomeController@delete_recu')->where('id', '[0-9]+');
Route::get('/infos', 'HomeController@get_all');
Route::get('/infos/{id}', 'HomeController@get_info')->where('id', '[0-9]+');
