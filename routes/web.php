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


Auth::routes();

Route::get('/home', 'HomeController@index');



Route::resource('provinces', 'ProvinceController');

Route::resource('cities', 'CityController');

Route::resource('connectiontypes', 'ConnectiontypeController');

Route::resource('ostypes', 'OstypeController');

Route::resource('roles', 'RoleController');

Route::resource('logtypes', 'LogtypeController');

Route::resource('vmtypes', 'VmtypeController');