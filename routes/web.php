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

Route::get('/', 'WorkerController@index');
Route::get('/worker', 'WorkerController@workers_list');
Route::get('/search_info', 'WorkerController@searchInfoWorkers');
Route::get('/sort_info', 'WorkerController@sortInfoWorkers');
