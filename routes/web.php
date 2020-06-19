<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;




/*
------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




/*
------------------------------------------------------------------------
| Todos Routes
|--------------------------------------------------------------------------
*/
Route::get('todos','TodoController@index');
Route::get('todos/create','TodoController@create');
Route::post('todos/create','TodoController@store');
Route::get('todos/edit','TodoController@edit');



/*
------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
	return view('welcome');
}
);

Route::get('about', function(){
	return view('about');
}
);

Route::get('user','UserController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload','UserController@uploadAvatar');
