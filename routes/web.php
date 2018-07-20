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
//     return view('welcome');
// });
Route::get('/', 'StudentController@index');
Route::prefix('students')->group(function () {
    Route::get('/', 'StudentController@index');
    Route::get('/create', 'StudentController@create');
    Route::post('/create', 'StudentController@store');
    Route::get('/{id}/edit', 'StudentController@edit');
    Route::put('/{id}', 'StudentController@update');
    Route::delete('/{id}', 'StudentController@destroy');
});