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

Route::get('/', 'Table@index')->name('home');

Route::get('/dep/', 'ResOfDepartment@index')->name('list-dep');
Route::get('/dep/add', 'ResOfDepartment@create')->name('add-dep');
Route::post('/dep/store/{id?}', 'ResOfDepartment@store')->name('store-dep');

Route::any('/dep/upd/{id}', 'ResOfDepartment@edit')->name('update-dep');
Route::any('/dep/del/{id}', 'ResOfDepartment@destroy')->name('delete-dep');

Route::get('/emp/', 'ResOfEmp@index')->name('list-emp');
Route::get('/emp/add', 'ResOfEmp@create')->name('add-emp');
Route::post('/emp/store/{id?}', 'ResOfEmp@store')->name('store');
Route::any('/emp/upd/{id}', 'ResOfEmp@edit')->name('update');
Route::any('/emp/del/{id}', 'ResOfEmp@showDelete')->name('delete');

