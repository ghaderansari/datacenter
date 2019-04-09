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
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::resource('provinces', 'ProvinceAPIController');

Route::resource('cities', 'CityAPIController');

Route::resource('connectiontypes', 'ConnectiontypeAPIController');

Route::resource('ostypes', 'OstypeAPIController');

Route::resource('roles', 'RoleAPIController');

Route::resource('logtypes', 'LogtypeAPIController');

Route::resource('vmtypes', 'VmtypeAPIController');