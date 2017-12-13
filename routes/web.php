<?php

Route::get('/', 'PostController@index');
Route::resource('post', 'PostController');

Route::post('post/{post}/comment', 'CommentController@store');
Route::get('post/tag/{tag}', 'TagController@index');
Route::get('post/user/{user}', 'PostController@filterByUser');
Route::post('post/search', 'PostController@filterByKeyword');

Route::get('login', 'LoginController@create')->name('login');
Route::post('login', 'LoginController@store');
Route::get('logout', 'LoginController@destroy');

Route::get('register', 'RegisterController@create');
Route::post('register', 'RegisterController@store');
