<?php

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::get('/', 'WelcomeController@index');

// PROFILE
Route::get('/profile/edit',"ProfileController@edit");
Route::put('/profile',"ProfileController@update");

// Notifications
Route::get('/notifications/recent', 'NotificationController@recent');
Route::put('/notifications/read', 'NotificationController@markAsRead');

// PROBLEMS
Route::get('problem/{problem}','ProblemsController@show');
Route::get('problems','ProblemsController@index');
Route::post('problem','ProblemsController@store');
//CONTACT
Route::get('/contact', 'ContactController@index');

//NEWS
Route::get('/news', 'NewsController@index');

// XHR
Route::group(['prefix' => 'xhr'],function(){
    Route::get('problems','XhrController@problems');
    Route::post('check-answer/{problem}','XhrController@checkAnswer');
    Route::post('problem/{problem}/solution','XhrController@storeSolution');
    Route::get('problem/{problem}/solutions','XhrController@getSolutions');
    Route::post('problem/{problem}/cheat','XhrController@cheat');
    Route::put('vote/{solution}','SolutionController@vote')->middleware('auth');
});
