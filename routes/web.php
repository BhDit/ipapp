<?php

Auth::routes();

Route::get('/home', 'HomeController@index');

/* PROFILE */
Route::get('/profile/edit',"ProfileController@edit");
Route::put('/profile',"ProfileController@update");

/* PROBLEMS */
Route::get('problem/{problem}','ProblemsController@show');
Route::get('problems','ProblemsController@index');

/* XHR */
Route::group(['prefix' => 'xhr'],function(){
    Route::get('problems','XhrController@problems');
});