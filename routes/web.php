<?php

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'WelcomeController@index');

/* PROFILE */
Route::get('/profile/edit',"ProfileController@edit");
Route::put('/profile',"ProfileController@update");

/* PROBLEMS */
Route::get('problem/{problem}','ProblemsController@show');
Route::get('problems','ProblemsController@index');
/*CONTACT*/
Route::get('/contact', 'ContactController@index');
/*NEWS*/
Route::get('/news', 'NewsController@index');
/*thankyoupage*/
Route::get('/thankyoupage', 'thankyoupage@index');
/* XHR */
Route::group(['prefix' => 'xhr'],function(){
    Route::get('problems','XhrController@problems');
    Route::post('check-answer/{problem}','XhrController@checkAnswer');
    Route::post('problem/{problem}/solution','XhrController@storeSolution');
});
