<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:Api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('provinces','Api\ProvinceController');
Route::resource('sexes','Api\SexController');
Route::resource('survey','Api\SurveyController');
Route::resource('questions','Api\QuestionsController');
Route::resource('repeats','Api\RepeatsController');