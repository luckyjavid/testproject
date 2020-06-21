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
| this command will create all the functions 
| related to routes in TodoController:
| php artisan make:controller TodoController --resource
*/
Route::resource('todo', 'TodoController');

/**
 * one way to apply middleware
 * Route::resource('todo', 'TodoController')->middleware("auth");
 */

// Route::get('todos','TodoController@index')->name('todo.index');
// Route::get('todos/create','TodoController@create');
// Route::post('todos/create','TodoController@store');
// // Route::get('todos/{id}/edit','TodoController@edit');
// Route::get('todos/{todo}/edit','TodoController@edit'); #route model binding
// Route::patch('todos/{todo}/update','TodoController@update')->name('todo.update');
// Route::delete('todos/{todo}/delete','TodoController@delete')->name('todo.delete');

Route::put('todos/{todo}/complete','TodoController@complete')->name('todo.complete');
Route::put('todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');



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
