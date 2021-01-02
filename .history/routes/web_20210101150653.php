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
Route::resource('galadana', 'GaladanaController', ['except' => ['show']]);
Route::get('/galadana/create', 'GaladanaController@create')->name('galadana', 'create');
Route::get('/g/{slug}', 'GaladanaController@post')->name('g', '[a-z]+');
Route::get('/galadana/{slug}', 'GaladanaController@kategori')->name('galadana', '[a-z]+');
Route::post('/galadana/load_komen/{id}', 'GaladanaController@load_komen')->name('galadana.load_komen');


Route::get('/load-more-data/{slug}', 'CampaignController@index')->name('loadmore', '[a-z]+');
Route::post('/loadmore/load_data', 'CampaignController@load_data')->name('loadmore.load_data');
Route::post('/load-more-data/{id}', 'CampaignController@load_more')->name('load-more-data');


// Route::get('/buat-penggalangan', 'GaladanaController@create')->name('penggalangan');
Route::get('/create-2', 'CampaignController@create2')->name('create-2');
Route::get('/create-3', 'CampaignController@create3')->name('create-3');
Route::get('/campaign', 'CampaignController@edit');

Route::get('/galadana/{slug}/donasi', 'DonateController@index')->name('galadana', '[a-z]+', 'donasi');
Route::resource('donasi', 'DonateController', ['except' => ['show']]);
Route::get('/donasi/intruksi/{id}', 'DonateController@intruksi')->name('donasi','intruksi');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('manajemen-kategori', 'KategoriController', ['except' => ['show']]);
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
    Route::get('kelola/{slug}/edit', 'GaladanaController@edit')->name('kelola.edit', '[a-z]+');
    Route::put('kelola{slug}', ['as' => 'galadana.update', 'uses' => 'GaladanaController@update']);
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/layout', 'AdminController@layout')->name('layout');
    Route::get('manajemen-post', 'AdminController@managepost')->name('manajemen-post');
    Route::get('manajemen-post/edit/{slug}', 'AdminController@edit')->name('manajemen-post.edit');
    Route::put('manajemen-post/{slug}', ['as' => 'manajemen-post.update', 'uses' => 'AdminController@update']);
    Route::get('/persetujuan-post', 'AdminController@approvalpost')->name('persetujuan-post');
    Route::get('/post-ditolak', 'AdminController@declinepost')->name('post-ditolak');
    Route::get('/test', 'AdminController@test')->name('test');
    Route::get('/persetujuan-post/approve/{id}', 'AdminController@approve')->name('persetujuan-post.approve');
    Route::get('/persetujuan-post/decline/{id}', 'AdminController@decline')->name('persetujuan-post.decline');
});
