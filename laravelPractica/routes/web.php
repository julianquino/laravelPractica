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

Route::middleware('auth')->group(function() {
	Route::resource('/companies',CompanyController::class);
	Route::resource('/subsidiaries',SubsidiaryController::class);
	Route::resource('/shifts',ShiftController::class);
	Route::resource('/users',UserController::class);
	Route::get('/authUser','UserController@authUser');
	/*Route::get('/users','UserController@index');
	Route::get('/users/{id}','UserController@show');*/
});


Route::get('companies/{company}/subsidiaries/{subsidiary}/shifts/{shift}','ShiftController@anyShow')->name('shift.anyShow');

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');
Route::get('/admin/companies', 'HomeController@show')->name('companies');
Route::get('/admin/subsidiaries', 'HomeController@show')->name('subsidiaries');
Route::get('/admin', function () {
    return view('/admin');
});









/*Route::post('/users/create','UserController@createNewUser');

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

Route::get('/home', 'HomeController@index')->name('home');*/
