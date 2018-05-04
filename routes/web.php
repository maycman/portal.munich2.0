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
#use App\Registro;

Route::get('/', 'principalController@index');
Route::get('/encuestas', 'encuestaController@index');
Route::get('/encuestas/servicio', 'encuestaController@servicio');
Route::get('/encuestas/servicio/{id}', 'encuestaController@show');
Route::post('/encuestas/servicio/guardar','encuestaController@store');
Route::get('/carga', 'baseEncuestaController@index');
Route::post('/cargando','baseEncuestaController@servicio');


Route::get('/4semanas','cuatroSemanasController@index');
Route::post('/4semanas/guardando','cuatroSemanasController@store');
Route::get('/4semanas/agrega/{id}','cuatroSemanasController@edit');
Route::post('/4semanas/guarda','cuatroSemanasController@update');
Route::get('/4semanas/liberar/{id}','cuatroSemanasController@destroy');
Route::post('/4semanas/buscando','cuatroSemanasController@show');
Route::get('/4semanas/busqueda','cuatroSemanasController@result');