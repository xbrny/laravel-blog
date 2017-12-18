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

Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/posts/{slug}', 'FrontEndController@showPost')->name('front.posts.show');
Route::get('/categories/{category}', 'FrontEndController@showCategory')->name('front.categories.show');
Route::get('/tags/{tag}', 'FrontEndController@showTag')->name('front.tags.show');
Route::get('/search', 'FrontEndController@search')->name('search');
Route::post('/subscribe', 'FrontEndController@subscribe')->name('subscribe');

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

	Route::get('settings', 'SettingsController@index')->name('settings');
	Route::post('settings.update', 'SettingsController@update')->name('settings.update');

	Route::get('users', 'UserController@index')->name('users');
	Route::get('users/admin/{user}', 'UserController@admin')->name('users.admin');
	Route::get('users/unadmin/{user}', 'UserController@unadmin')->name('users.unadmin');
	Route::get('users/create', 'UserController@create')->name('users.create');
	Route::post('users/store', 'UserController@store')->name('users.store');
	Route::get('users/destroy/{user}', 'UserController@destroy')->name('users.destroy');

	Route::get('profile', 'ProfileController@show')->name('profile');
	Route::post('profile/update', 'ProfileController@update')->name('profile.update');

	Route::get('/dashboard', 'HomeController@index')->name('home');

	Route::get('/tags', 'TagController@index')->name('tags');
	Route::get('/tags/create', 'TagController@create')->name('tags.create');
	Route::post('/tags/store', 'TagController@store')->name('tags.store');
	Route::get('/tags/edit/{tag}', 'TagController@edit')->name('tags.edit');
	Route::post('/tags/update/{tag}', 'TagController@update')->name('tags.update');
	Route::get('/tags/destroy/{tag}', 'TagController@destroy')->name('tags.destroy');

	Route::get('/categories', 'CategoryController@index')->name('categories');
	Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
	Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
	Route::get('/categories/edit/{category}', 'CategoryController@edit')->name('categories.edit');
	Route::post('/categories/update/{category}', 'CategoryController@update')->name('categories.update');
	Route::get('/categories/destroy/{category}', 'CategoryController@destroy')->name('categories.destroy');

	Route::get('/posts', 'PostController@index')->name('posts');
	Route::get('/posts/create', 'PostController@create')->name('posts.create');
	Route::post('/posts/store', 'PostController@store')->name('posts.store');
	Route::get('/posts/edit/{post}', 'PostController@edit')->name('posts.edit');
	Route::post('/posts/update/{post}', 'PostController@update')->name('posts.update');
	Route::get('/posts/show/{post}', 'PostController@show')->name('posts.show');
	Route::get('/posts/destroy/{post}', 'PostController@destroy')->name('posts.destroy');
	Route::get('/posts/trashed', 'PostController@trashed')->name('posts.trashed');
	Route::get('/posts/restore/{id}', 'PostController@restore')->name('posts.restore');
	Route::get('/posts/kill/{post}', 'PostController@kill')->name('posts.kill');

});