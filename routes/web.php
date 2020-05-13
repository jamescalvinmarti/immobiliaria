<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['uses' => 'FrontendController@home', 'as' => 'home']);

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::resource('categories', 'CategoriesController', ['except' => ['show']]);
	Route::resource('zones', 'ZonesController', ['except' => ['show']]);
	Route::resource('properties', 'PropertiesController');
	Route::post('publish/{property}', ['uses' => 'PropertiesController@publishUnpublish', 'as' => 'properties.publish']);
	Route::resource('images', 'ImagesController', ['only' => ['index', 'store', 'destroy']]);
	Route::get('images/create/{property}', ['uses' => 'ImagesController@create', 'as' => 'images.create']);
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
});
