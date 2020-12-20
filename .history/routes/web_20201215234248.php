<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/galadana/create', 'GaladanaController@create')->name('galadana', 'create');
Route::get('/galadana/{slug}', 'GaladanaController@post')->name('galadana', '[a-z]+');
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/layout', 'AdminController@layout')->name('layout');
Route::get('/manajemen-post', 'AdminController@managepost')->name('manajemen-post');
Route::get('/persetujuan-post', 'AdminController@approvalpost')->name('persetujuan-post');
Route::get('/test', 'AdminController@test')->name('test');

Route::get('/loadmore', 'CampaignController@index');
Route::post('/loadmore/load_data', 'CampaignController@load_data')->name('loadmore.load_data');


// Route::get('/buat-penggalangan', 'GaladanaController@create')->name('penggalangan');
Route::get('/create-2', 'CampaignController@create2')->name('create-2');
Route::get('/create-3', 'CampaignController@create3')->name('create-3');
Route::get('/campaign', 'CampaignController@edit');

Route::get('/galadana/{slug}/donasi', 'DonateController@index')->name('galadana', '[a-z]+', 'donasi');
Route::resource('donasi', 'DonateController', ['except' => ['show']]);
Route::get('/donasi/intruksi/{id}', 'DonateController@intruksi')->name('donasi','intruksi');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('galadana', 'GaladanaController', ['except' => ['show']]);
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
    Route::get('/galadana/edit/{slug}', 'GaladanaController@edit')->name('galadana', 'edit','[a-z]+');
});
