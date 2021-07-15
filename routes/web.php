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
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'PagesController@index')->name('index');
    Route::get('/contact', 'PagesController@contact')->name('contact');

    //BLOGS
    Route::get('/blogs', 'BlogsController@index')->name('blogs_index');
    Route::get('/blog/add', 'BlogsController@add')->name('add_blog');
    Route::post('/blog/create', 'BlogsController@create')->name('create_blog');
    Route::get('/blog/{blog}', 'BlogsController@show')->name('show_blog');
    Route::get('/blog/{blog}/edit', 'BlogsController@edit')->name('edit_blog');
    Route::post('/blog/{blog}/edit', 'BlogsController@update')->name('update_blog');
    Route::post('/blog/{blog}/delete', 'BlogsController@delete')->name('delete_blog');
    Route::get('/blogs/{tag}', 'BlogsController@index')->name('blogs_according_to_tag');

    //USERS
    Route::get('/users', 'UserController@index')->name('users_index');
    Route::get('/user/add', 'UserController@add')->name('add_user');
    Route::post('/user/create', 'UserController@create')->name('create_user');
    Route::get('/user/{user}/edit', 'UserController@edit')->name('edit_user');
    Route::post('/user/{user}/update', 'UserController@update')->name('update_user');
});

Auth::routes();
