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

Route::get('/challenges', 'ChallengeController@index')->name('challenges.index');
Route::get('/challenges/create', 'ChallengeController@create')->name('challenges.create');
Route::post('/challenges', 'ChallengeController@store')->name('challenges.store');
Route::get('/challenges/{challenge}', 'ChallengeController@show')->name('challenges.show');

Route::get('/personal/challenges', 'PersonalChallengeController@index')->name('personal.challenges.index');

Auth::routes();
Route::get('/logout', 'LogOutController@update')->name('logout.update');
Route::get('/home', 'HomeController@index')->name('home');
