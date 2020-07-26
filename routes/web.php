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
Route::group(['prefix' => 'Customer'], function(){
    Route::get('/', 'CustomerController@index')->name('Customer.index');
    Route::get('/create', 'CustomerController@create')->name('Customer.create');
    Route::get('/{id}/show', 'CustomerController@show')->name('Customer.show');
    Route::get('/{id}/edit', 'CustomerController@edit')->name('Customer.edit');
    Route::put('/{id}/update', 'CustomerController@update')->name('Customer.update');
    Route::delete('/{id}', 'CustomerController@destroy')->name('Customer.destroy');
});
