<?php

use Illuminate\Http\Request;
//use App\Http\Controllers\API\EmployeeAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('employees', 'EmployeeAPIController');
Route::apiResource('departments', 'DepartmentAPIController');
Route::apiResource('employees.titles', 'TitleAPIController')->except(['destroy, update']);
Route::apiResource('employees.salaries', 'SalaryAPIController')->except(['destroy, update']);
Route::get('employees/{employee}/title', 'TitleAPIController@current');
Route::get('employees/{employee}/salary', 'SalaryAPIController@current');
