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

Route::resource('usuario', 'UsuarioController');
Route::resource('producto', 'ProductoController');
Route::resource('actividad', 'ActividadController');
Route::resource('clase', 'ClaseController')->except(['index']);
Route::resource('cuenta', 'CuentaController')->except(['index']);
Route::get('usuario/{id}/consumo','UsuarioController@indexConsumo');
Route::post('usuario/{id}/consumo','UsuarioController@storeConsumo');
Route::patch('usuario/{id}/consumo/{registro}','UsuarioController@updateConsumo');
Route::get('usuario/{id}/consumo/{registro}','UsuarioController@showConsumo');
Route::delete('usuario/{id}/consumo/{registro}','UsuarioController@destroyConsumo');

Route::get('usuario/{id}/clase','UsuarioController@indexClase');
Route::post('usuario/{id}/clase','UsuarioController@storeClase');
Route::patch('usuario/{id}/clase/{registro}','UsuarioController@updateClase');
Route::get('usuario/{id}/clase/{registro}','UsuarioController@showClase');
Route::delete('usuario/{id}/clase/{registro}','UsuarioController@destroyClase');
Route::get('actividad/{id}/clases','ActividadController@getClases');

Route::get('login','UsuarioController@login');