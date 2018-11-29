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
Route::get('/available', function () {
    return view('available');
});
Route::get('/all', function () {
    return view('all');
});

Route::resource('shares', 'ShareController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
