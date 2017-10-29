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

// Route::get('/', function () {
    // return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('character')->group(function($router){
	$router->get('/index', 'CharacterController@index')->name('character.index');
	$router->get('/create', 'CharacterController@create')->name('character.create');
	$router->post('/{id}/show', 'CharacterController@show')->name('character.show');
});

Route::prefix('user')->group(function($router){
	$router->get('/index', 'UserController@index')->name('user.index');
	$router->get('/create', 'UserController@create')->name('user.create');
	$router->post('/show', 'UserController@show')->name('user.show');
});

