<?php

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::get('/', 'WelcomeController@index');

// PROFILE
Route::get('/profile/edit', "ProfileController@edit");
Route::put('/profile', "ProfileController@update");

// Notifications
Route::get('/notifications/recent', 'NotificationController@recent');
Route::put('/notifications/read', 'NotificationController@markAsRead');

// PROBLEMS
Route::get('problem/{problem}', 'ProblemsController@show');
Route::get('problems', 'ProblemsController@index');
Route::post('problem', 'ProblemsController@store');
//CONTACT
Route::get('/contact', 'ContactController@index');

//NEWS
Route::get('/news', 'NewsController@index');

// XHR
Route::group(['prefix' => 'xhr'], function () {
    Route::get('problems', 'XhrController@problems');
    Route::post('check-answer/{problem}', 'XhrController@checkAnswer');
    Route::post('problem/{problem}/solution', 'XhrController@storeSolution');
    Route::get('problem/{problem}/solutions', 'XhrController@getSolutions');
    Route::post('problem/{problem}/cheat', 'XhrController@cheat');
    Route::put('vote/{solution}', 'SolutionController@vote')->middleware('auth');
    Route::get('user/level-chart', function () {
        $solved = request()->user()->solved;
        $low = $solved->filter(function ($problem) {
            return $problem->level == 'low';
        })->count();
        $medium = $solved->filter(function ($problem) {
            return $problem->level == 'medium';
        })->count();
        $hard = $solved->filter(function ($problem) {
            return $problem->level == 'hard';
        })->count();
        return response()->json([
            'labels' => ['LOW', 'MEDIUM', 'HARD'],
            'datasets' => [
                [
                    'label' => 'Solved Problems',
                    'backgroundColor' => [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56"
                    ],
                    'data' => [$low, $medium, $hard]
                ]
            ]
        ]);
    })->middleware('auth');
});
