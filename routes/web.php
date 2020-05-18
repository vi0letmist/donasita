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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'PostController@index')->name('post');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/create-1', 'CampaignController@index')->name('create-1');
Route::get('/create-2', 'CampaignController@create2')->name('create-2');
