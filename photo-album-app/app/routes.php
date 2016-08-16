<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array ('as'=>'home', 'uses'=>'HomeController@getIndex'));

Route::get('users', array ('as'=>'users', 'uses'=>'UsersController@getIndex'));

Route::get('users/{id}', array ('as'=>'user', 'uses'=>'UsersController@getView'));

Route::get('registration', array ('as'=>'registration', 'uses'=>'UsersController@getRegistrationView'));

Route::get('login', array ('as'=>'login', 'uses'=>'UsersController@getLoginView'));

Route::post('users/create', array ('uses'=>'UsersController@postCreate'));

Route::post('login', array ('uses'=>'UsersController@postLogin'));

Route::get('upload', array ('as'=>'upload', 'uses'=>'PhotoController@getUploadView'));

Route::get('photos', array ('as'=>'photos', 'uses'=>'PhotoController@getIndex'));

Route::post('upload', array ('uses'=>'PhotoController@postUpload'));

Route::get('users/{id}/photos', array ('as'=>'user_photos', 'uses'=>'PhotoController@getView'));

Route::get('users/{id}/{num}/edit', array ('as'=>'edit_photo', 'uses'=>'PhotoController@getEdit'));

Route::post('users/{id}/{num}/edit', array ('uses'=>'PhotoController@postEdit'));

Route::delete('users/{id}/{num}/delete', array ('uses'=>'PhotoController@deletePhoto'));
