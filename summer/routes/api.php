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

Route::resource('/user', 'Api\UserController');
Route::resource('provinces','Api\ProvinceController');
Route::resource('sexes','Api\SexController');
Route::resource('survey','Api\SurveyController');
Route::resource('questions','Api\QuestionsController');
Route::resource('repeats','Api\RepeatsController');
Route::resource('Report','Api\ReportController');
Route::get('user_survey/{id}', 'Api\SurveyController@user_survey');
Route::get('report_comment/{id}', 'Api\ReportController@report_comment');
