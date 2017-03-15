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

Route::get('/', 'HomeController@index')->name('home');
Route::get('register', 'UserController@create');
Route::post('register', 'UserController@store');
Route::get('logout', 'UserController@logout')->name('logout');
Route::get('login', 'UserController@login')->name('login');
Route::post('login', 'UserController@logUser');
Route::group(['prefix' => 'posts/'], function (){
    Route::get('/', 'PostsController@index');
    Route::get('create', 'PostsController@create');
    Route::post('create', 'PostsController@store');
    Route::get('{id}', 'PostsController@show');
    Route::get('edit/{id}', 'PostsController@edit');
    Route::patch('edit/{id}', 'PostsController@update');
    Route::delete('delete/{id}', 'PostsController@destroy');
    Route::post('comments/delete/{id}', 'CommentsController@destroy');
    Route::post('{id}/comment/create', 'CommentsController@create');
});

