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

//User Routes
Route::group(['namespace'=>'User'],function (){
    Route::get('/','HomeController@index')->name('home');
    Route::get('post/{slug}','PostController@post')->name('post');
});

//Admin Routes
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    Route::get('home','HomeController@index')->name('admin.home');
    //User Route
    Route::resource('user','UserController');
    //Post Route
    Route::resource('post','PostController');
    //Tag Route
    Route::resource('tag','TagController');
    //Category Route
    Route::resource('category','CategoryController');
});


