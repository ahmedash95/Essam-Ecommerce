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
Route::get('/', ['uses' => 'ProductsController@index', 'as' => 'products.index']);

/**
 * Collect the routes that related to the user operation and give them a prefix
 */
Route::group(['prefix'=>'user'], function(){

	/**
	 * The routes that allowed only for guests
	 */	
	Route::group(['middleware' => 'guest'], function(){

		 
		Route::get('/signup', ['uses'=> 'UsersController@getSignup', 'as' => 'users.signup']);

		Route::post('/signup', ['uses'=> 'UsersController@postSignup', 'as' => 'users.signup']);

		Route::get('/signin', ['uses'=> 'UsersController@getSignin', 'as' => 'users.signin']);

		Route::post('/signin', ['uses'=> 'UsersController@postSignin', 'as' => 'users.signin']);
	});

	/**
	 * The routes taht allowed only for authenticated users
	 */
	Route::group(['middleware' => 'auth'], function(){
		Route::get('/logout', ['uses' => 'UsersController@logout', 'as' => 'users.logout']);
	});
});
