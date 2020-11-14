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
Route::group(['middleware' => 'auth'], function () {
    Route::resource('galadana', 'GaladanaController', ['except' => ['show']]);
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/galadana/{$slug}', 'PostController@index')->name('post');
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/layout', 'AdminController@layout')->name('layout');
Route::get('/manajemen-post', 'AdminController@managepost')->name('manajemen-post');
Route::get('/persetujuan-post', 'AdminController@approvalpost')->name('persetujuan-post');
Route::get('/test', 'AdminController@test')->name('test');


// Route::get('/buat-penggalangan', 'GaladanaController@create')->name('penggalangan');
Route::get('/create-2', 'CampaignController@create2')->name('create-2');
Route::get('/create-3', 'CampaignController@create3')->name('create-3');
Route::get('/campaign', 'CampaignController@edit');

Route::get('/donasi-1', 'DonateController@index')->name('donasi-1');
Route::get('/intruksi', 'DonateController@intruksi')->name('intruksi');