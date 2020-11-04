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

Route::middleware(['auth'])->group(function () {

Route::get('/home', 'HomeController@index')->name('home');


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
Route::get('tipocuentas', 'TipocuentasController@index')->name('tipocuentas.index')
->middleware('can:tipocuentas.index');
Route::get('tipocuentas/tipocuenta', 'Tipocuentas@create')->name('tipocuentas.create')
->middleware('can:tipocuentas.create');
Route::get('tipocuentas/{tipocuenta}', 'Tipocuentas@show')->name('tipocuentas.show')
->middleware('can:tipocuentas.show');
Route::post('tipocuentas', 'Tipocuentas@store')->name('tipocuentas.store')
->middleware('can:tipocuentas.create');
Route::get('tipocuentas/{tipocuenta}/edit', 'Tipocuentas@edit')->name('tipocuentas.edit')
->middleware('can:tipocuentas.edit');
Route::put('tipocuentas/{tipocuenta}', 'Tipocuentas@update')->name('tipocuentas.update')
->middleware('can:tipocuentas.update');
Route::delete('tipocuentas/tipocuenta}', 'Tipocuentas@destroy')->name('tipocuentas.destroy')
->middleware('can:tipocuentas.destroy');

//Empresas
Route::get('empresas', 'EmpresasController@index')->name('empresas.index');
Route::get('empresas/empresa', 'EmpresasController@create')->name('empresas.create');
Route::get('empresas/{empresa}', 'EmpresasController@show')->name('empresas.show')
->middleware('can:empresas.show');
Route::post('empresas', 'EmpresasController@store')->name('empresas.store');
Route::get('empresas/{empresa}/edit', 'EmpresasController@edit')->name('empresas.edit');
Route::put('empresas/{empresa}', 'EmpresasController@update')->name('empresas.update');
Route::delete('empresas/empresa}', 'EmpresasController@destroy')->name('empresas.destroy')
->middleware('can:tipocuentas.destroy');

});