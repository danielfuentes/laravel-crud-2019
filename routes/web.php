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

Route::get('/', 'HomeController@index');
//Amigas y amigos avance con este código para que ustedes lo estudien, igual el jueves lo puedo volver a programar o a explicar por si tienen dudas, como les habia indicado, con esta ruta queremos mostrar el listado de películas que tenemos en nuestra tabla movies
//-------Trabajando sobre Movies -------
Route::get('/proximosEstrenos','MovieController@index');    
//Aquí voy a crear una ruta pero ahora para ver el detalle de la película
Route::get('/detallePelicula/{id}', 'MovieController@show');

Route::get('/incluirPelicula','MovieController@create');
Route::post('/savePelicula','MovieController@save');

//Route::get('/', function () {
//    return view('welcome');
//});
