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

Route::get('/usuarios', 'UsuarioControl@index');

Route::get('/usuarios/nuevo', 'UsuarioControl@nuevo');

Route::get('/usuarios/{id}', 'UsuarioControl@show');

Route::get('/saludo/{nombre}/{nicknombre?}', 'UsuarioControl@saludo');