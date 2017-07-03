<?php

use App\Person;

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
    $personas = Person::all();
    return view('welcome', ['personas' => $personas]);
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/users', 'PersonController@get');
	Route::get('/users/{id}', 'PersonController@getById');
	Route::post('/users', 'PersonController@create');
    Route::get('/users/{id}/afinidad', 'RequestController@afinidad');    
});



// Route::resource('users', 'PersonController@create');