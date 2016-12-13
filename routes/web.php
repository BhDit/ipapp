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
Route::get('w1', function () {
    return view('welcome1');
});
Route::get('problems',function(){
    return view('problems') ;
});
Route::get('question',function(){
    return view('question') ;
});
Route::get('contact',function(){
    return view('contact') ;
});
Route::get('news',function(){
    return view('news') ;
});
Route::get('profile',function(){
    return view('profile') ;
});
Route::get('signin',function(){
    return view('signin') ;
});



Auth::routes();





