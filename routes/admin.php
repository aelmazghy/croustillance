<?php

Route::group(['middleware' => ['auth']], function() { // if user connected

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('news', 'NewsController');
    Route::resource('users', 'UserController');
    Route::resource('settings', 'SettingsController');


});






