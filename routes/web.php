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

Route::group([ 'middleware' => 'auth'], function(){
    Route::GET('/workers', 'WorkerController@workers_list');
    Route::GET('/search_info', 'WorkerController@searchInfoWorkers');
    Route::GET('/sort_info', 'WorkerController@sortInfoWorkers');
    Route::PUT('/worker/{id}', 'WorkerController@update');
    Route::GET('/worker/{id}/edit', 'WorkerController@edit');
    Route::GET('/worker/create', 'WorkerController@create');
    Route::POST('/worker', 'WorkerController@store');
    Route::DELETE('/worker/{id}', 'WorkerController@destroy');
    Route::GET('/ajax/workers', 'WorkerController@workers_list_ajax');
    Route::GET('/ajax/search_info', 'WorkerController@searchAjaxInfoWorkers');
    Route::GET('/ajax/short', 'WorkerController@short');
    Route::GET('/ajax/subordinate', 'WorkerController@subordinate');
});

Auth::routes();

Route::get('/home', 'WorkerController@index')->name('home');
