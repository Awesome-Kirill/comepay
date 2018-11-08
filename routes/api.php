<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/



Route::get('list', 'Api\TableController@index');

Route::get('departments/list', 'Api\DepartmentController@index');
Route::get('employee/list', 'Api\EmployeeController@index');

Route::post('departments/create', 'Api\DepartmentController@create');
Route::post('departments/edit/{id}', 'Api\DepartmentController@edit');
Route::delete('departments/delete/{id}', 'Api\DepartmentController@destroy');


Route::post('employee/create', 'Api\EmployeeController@create');
Route::post('employee/edit/{id}', 'Api\EmployeeController@edit');
Route::delete('employee/delete/{id}', 'Api\EmployeeController@destroy');
