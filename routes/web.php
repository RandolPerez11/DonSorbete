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
Route::get('/h', 'HomeController@hola')->name('home');


Route::middleware(['auth'])->group(function(){

  //acceso a roles

  Route::post('roles/store', 'RoleController@store')->name('roles.store')
  ->middleware('permission:roles.create');

  Route::get('roles', 'RoleController@index')->name('roles.index')
  ->middleware('permission:roles.index');

  Route::get('roles/create', 'RoleController@create')->name('roles.create')
  ->middleware('permission:roles.create');

  Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
  ->middleware('permission:roles.edit');

  Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
  ->middleware('permission:roles.show');

  Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
  ->middleware('permission:roles.destroy');

  Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
  ->middleware('permission:roles.edith');

  //acceso a usuarios

  Route::get('users/create', 'UserController@create')->name('users.create')
  ->middleware('permission:roles.create');

  Route::post('users/store', 'UserController@store')->name('users.store')
  ->middleware('permission:users.create');

  Route::get('users', 'UserController@index')->name('users.index')
  ->middleware('permission:users.index');

  Route::put('users/{user}', 'UserController@update')->name('users.update')
  ->middleware('permission:users.edit');

  Route::get('users/{user}', 'UserController@show')->name('users.show')
  ->middleware('permission:users.show');

  Route::get('users/{user}/delete', 'UserController@destroy')->name('users.destroy')
  ->middleware('permission:users.destroy');

  Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
  ->middleware('permission:users.edit');

  //acceso a Sucursales

  Route::get('sucursal', 'SucursalesController@index')->name('sucur.index')
  ->middleware('permission:users.index');

  Route::get('sucursal/create', 'SucursalesController@create')->name('sucur.create')
  ->middleware('permission:roles.create');

  Route::post('sucursal/store', 'SucursalesController@store')->name('sucur.store')
  ->middleware('permission:users.create');

  Route::get('sucursal/{user}/delete', 'SucursalesController@destroy')->name('sucur.destroy')
  ->middleware('permission:users.destroy');

  //acceso a Ventas

  Route::get('ventas', 'VentasController@index')->name('vent.index')
  ->middleware('permission:ventas.index');

  Route::get('ventas/store', 'VentasController@store')->name('vent.store')
  ->middleware('permission:ventas.index');

  Route::post('ventas/create', 'VentasController@create')->name('vent.create')
  ->middleware('permission:ventas.index');

  Route::get('ventas/cierredecaja', 'VentasController@buscarCierre')->name('vent.buscierre')
  ->middleware('permission:users.index');

  Route::get('ventas/cajaInicial', 'VentasController@CajaI')->name('vent.cajaI')
  ->middleware('permission:ventas.index');

  Route::post('ventas/cajaInicial/cierre', 'VentasController@cajaInicial')->name('vent.cajaInicial')
  ->middleware('permission:ventas.index');

  Route::post('ventas/cierredecaja/sucursales', 'VentasController@cierre')->name('vent.cierre')
  ->middleware('permission:users.index');

  Route::post('ventas/cierredecaja/exit', 'VentasController@cierreCaja')->name('vent.cierreCaja')
  ->middleware('permission:users.index');

  //acceso a Egresos

  Route::get('Egresos', 'EgresosController@index')->name('egre.index')
  ->middleware('permission:ventas.index');

  Route::get('Egresos/create', 'EgresosController@create')->name('egre.create')
  ->middleware('permission:ventas.index');

  Route::post('Egresos/create/store', 'EgresosController@store')->name('egre.store')
  ->middleware('permission:users.index');

  Route::get('Egresos/{egresos}/delete', 'EgresosController@destroy')->name('egre.destroy')
  ->middleware('permission:users.destroy');


  //acceso a Configuracion

  Route::get('Configuracion', 'ConfiguracionController@index')->name('config.index')
  ->middleware('permission:users.index');

  Route::post('Configuracion/Img', 'ConfiguracionController@create')->name('config.create')
  ->middleware('permission:users.index');

  Route::post('Configuracion/Pre', 'ConfiguracionController@store')->name('config.store')
  ->middleware('permission:users.index');


  //acceso a Reportes

  Route::post('Reporte/sucursal/create', 'ConfiguracionController@reporte')->name('config.repor')
  ->middleware('permission:users.index');

  Route::post('Reporte/promocion/create', 'ConfiguracionController@promocion')->name('config.promo')
  ->middleware('permission:users.index');

  Route::post('Reporte/promocion2/create', 'ConfiguracionController@promocion2')->name('config.promo2')
  ->middleware('permission:users.index');

  Route::get('Reporte', 'ConfiguracionController@Breporte')->name('config.Brepor')
  ->middleware('permission:users.index');



});
