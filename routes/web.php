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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'MainController@index');

Route::get('album/all', 'MainController@allAlbums');
Route::get('album/search', 'MainController@albumSearch');

Route::post('album/save', 'MainController@save_album');
Route::post('gallery/image/save', 'MainController@image_upload');
Route::get('gallery/image/show', 'MainController@gallery_page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
