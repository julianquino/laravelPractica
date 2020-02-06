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
Route::get('/articles','ArticlesController@index');
Route::get('/articles/{article}','ArticlesController@show');

Route::get('/usuarios', 'UsuarioControl@index');

Route::get('/usuarios/nuevo', 'UsuarioControl@nuevo');

Route::get('/usuarios/{id}', 'UsuarioControl@show');

Route::get('/saludo/{nombre}/{nicknombre?}', 'UsuarioControl@saludo');
Route::get('/test',function(){
	$name = request()->has('name');
	if($name != null){
		return view('test',[ 'name'=>$name ]);
	}else{
		return 'no existe ese nombre';
	}
});
Route::get('/post/{post}','PostsController@show');