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

Route::get('/home', 'HomeController@index')->name('home');

//cuentas
Route::get('cuentas', 'CuentasController@index')->name('cuentas.index')
->middleware('can:cuentas.index');
Route::get('cuentas/cuenta', 'CuentasController@create')->name('cuentas.create')
->middleware('can:cuentas.create');
Route::get('cuentas/{cuenta}', 'CuentasController@show')->name('cuentas.show')
->middleware('can:cuentas.show');
Route::post('cuentas', 'CuentasController@store')->name('cuentas.store')
->middleware('can:cuentas.create');
Route::get('cuentas/{cuenta}/edit', 'CuentasController@edit')->name('cuentas.edit')
->middleware('can:cuentas.edit');
Route::put('cuentas/{cuenta}', 'CuentasController@update')->name('cuentas.update')
->middleware('can:cuentas.update');
Route::delete('cuentas/{cuenta}', 'CuentasController@destroy')->name('cuentas.destroy')
->middleware('can:cuentas.destroy');
