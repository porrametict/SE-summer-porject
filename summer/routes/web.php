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

Auth::routes();

Route::get('/p2', function () {
    return view('p2');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user_edit', 'HomeController@edit')->name('user_edit');
Route::post('/user_edit', 'HomeController@update')->name('user_edit');
Route::get('ddprovinces','ProvinceDropdownController@index')->name('ddprovinces');
Route::get('ddsex','SexDropdownController@index')->name('ddsex');
