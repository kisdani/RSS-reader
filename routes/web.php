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
    return view('auth/login');
});

Auth::routes();
Route::get('home', 'HomeController@index');
Route::get('news', 'NewsController@list')->name('news')->middleware('auth');
Route::get('dashboard', 'RssFeedController@list')->name('dashboard')->middleware('auth');

Route::post('dashboard', 'RssFeedController@save')->middleware('auth');
Route::delete('delete/{id}', 'RssFeedController@delete')->middleware('auth');
