<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'welcomeController@otzivy');



Route::get('/fotootchety','welcomeController@fotootchety');
//Offline Courses
Route::get('/raspisaniemr','offlinemkController@raspisaniemr');

Route::get('/offlinemasters','offlinemkController@offlinemasters');

Route::get('/offlinecurses','offlinemkController@offlinecursesajax');

Route::get('/offlinepopup','offlinemkController@offlinepopup');
// Online Courses
Route::get('/onlinecourses/{id}', 'onlinecoursesController@onlinecourses');

Route::post('/onlinevideo','onlinecoursesController@onlinevideo');

Route::get('/onlinecurses','onlinecoursesController@onlinecursesajax');

Route::get('/pastrylaboratory','onlinecoursesController@pastrylaboratory');

Route::get('/mainvideo','onlinecoursesController@mainvideo');

Auth::routes();

	Route::group(['middleware' => 'auth'], function(){
		Route::get('/admin', 'Admin\AdminController@admin');
		Route::get('/users', 'Admin\AdminController@userstable');
		Route::get('/onlinecours', 'Admin\AdminController@onlinecours');
	});


