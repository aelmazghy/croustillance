<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware('auth')->group(function () {


    Route::get('gest', 'DashboardController@index')->name('dashboard');
    Route::get('gest/articles', 'ArticleController@index')->name('articles');
    Route::get('gest/articles/create', 'ArticleController@create')->name('create');
    Route::post('gest/articles', 'ArticleController@store')->name('store');
    Route::get('gest/users', 'UserController@index')->name('users');
    Route::get('gest/settings', 'SettingsController@index')->name('settings');




});
