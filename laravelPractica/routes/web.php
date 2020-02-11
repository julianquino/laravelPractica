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

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('logout','Auth\LoginController@logout')->name('logout');
//Route::get('register','Auth\LoginController@showRegistrationForm');

















Route::post('/users/create','UserController@createNewUser');

Route::get('/users/new','UserController@create');


Route::get('/articles','ArticlesController@index');
Route::get('/articles/{article}','ArticlesController@show');

Route::get('/usuarios', 'UserController@index');

Route::get('/usuarios/nuevo', 'UserController@nuevo');

Route::get('/usuarios/{id}', 'UserController@show');

Route::get('/saludo/{nombre}/{nicknombre?}', 'UserController@saludo');
Route::get('/test',function(){
	$name = request()->has('name');
	if($name != null){
		return view('test',[ 'name'=>$name ]);
	}else{
		return 'no existe ese nombre';
	}
});
Route::get('/post/{post}','PostsController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
