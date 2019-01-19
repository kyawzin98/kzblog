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
Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index')->name('blog');
    Route::get('post/{slug}', 'PostController@post')->name('post');
    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('post/category/{category}', 'HomeController@category')->name('category');

    //Vue Routes
    Route::post('/getPosts','PostController@getAllPosts');
    Route::post('/saveLike','PostController@saveLike');
});

//Admin Routes
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('home', 'HomeController@index')->name('admin.home');
    //User Routes
    Route::resource('user', 'UserController');
    //Post Route
    Route::resource('post', 'PostController');
    //Tag Route
    Route::resource('tag', 'TagController');
    //Category Route
    Route::resource('category', 'CategoryController');
    //Role Route
    Route::resource('role','RoleController');
    //Permission Route
    Route::resource('permission','PermissionController');

    //Admin Auth Routes
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login');

    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
