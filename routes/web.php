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

Route::get('balances', function () {
    return view('balances.index');
});

Auth::routes();

Route::get('/', function(){
    return view('auth.login');
});


Route::get('/principal', 'PrincipalController@index')->name('template.plantilla2');

//cuentas
Route::get('cuentas', 'CuentasController@index')->name('cuentas.index');

Route::get('cuentas/cuenta', 'CuentasController@create')->name('cuentas.create');

Route::get('cuentas/{cuenta}', 'CuentasController@show')->name('cuentas.show')
->middleware('can:cuentas.show');
Route::post('cuentas', 'CuentasController@store')->name('cuentas.store');

Route::get('cuentas/{cuenta}/edit', 'CuentasController@edit')->name('cuentas.edit');
Route::put('cuentas/{cuenta}', 'CuentasController@update')->name('cuentas.update');
Route::delete('cuentas/{cuenta}', 'CuentasController@destroy')->name('cuentas.destroy');

//tipo cuentas
Route::get('tipocuentas', 'TipocuentasController@index')->name('tipocuentas.index');
Route::get('tipocuentas/tipocuenta', 'TipocuentasController@create')->name('tipocuentas.create');
Route::get('tipocuentas/{tipocuenta}', 'TipocuentasController@show')->name('tipocuentas.show');
Route::post('tipocuentas', 'TipocuentasController@store')->name('tipocuentas.store');
Route::get('tipocuentas/{tipocuenta}/edit', 'TipocuentasController@edit')->name('tipocuentas.edit');
Route::put('tipocuentas/{tipocuenta}', 'TipocuentasController@update')->name('tipocuentas.update');
Route::delete('tipocuentas/{tipocuenta}', 'TipocuentasController@destroy')->name('tipocuentas.destroy');


//Empresas
Route::get('empresas', 'EmpresasController@index')->name('empresas.index');
Route::get('empresas/empresa', 'EmpresasController@create')->name('empresas.create');
Route::get('empresas/{empresa}', 'EmpresasController@show')->name('empresas.show');
Route::post('empresas', 'EmpresasController@store')->name('empresas.store');
Route::get('empresas/{empresa}/edit', 'EmpresasController@edit')->name('empresas.edit');
Route::put('empresas/{empresa}', 'EmpresasController@update')->name('empresas.update');
Route::delete('empresas/{empresa}', 'EmpresasController@destroy')->name('empresas.destroy');

//balances
Route::get('balances', 'BalancesController@index')->name('balances.index');
Route::get('balances/balance', 'BalancesController@create')->name('balances.create');
Route::post('balances', 'BalancesController@store')->name('balances.store');
Route::put('balances/{balance}', 'BalancesController@update')->name('balances.update');
Route::post('balances', 'BalancesController@store')->name('balances.store');