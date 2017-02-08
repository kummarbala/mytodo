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

Route::get('/', 'IndexController@index');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
Route::get('/home', 'TodoController@home');
Route::get('/todo', 'TodoController@index');
Route::get('/todos', 'TodoController@get');
Route::post('/insert', 'TodoController@insert');
Route::post('/docomplete','TodoController@docomplete');
Route::post('/dodelete','TodoController@dodelete');
Route::get('/todosactive', 'TodoController@todosactive');
Route::get('/todoscompleted', 'TodoController@todoscompleted');

Route::get('logout', function (){
Auth::logout();
return redirect('/');
});


