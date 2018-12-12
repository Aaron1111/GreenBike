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
Route::get('/profil', function () {
    return view('profil');
});

Auth::routes();


Route::get('/home', 'ShareController@Navailable');
Route::get('/all', 'ShareController@all');
Route::get('/available', 'ShareController@available');

Route::resource('shares', 'ShareController');
