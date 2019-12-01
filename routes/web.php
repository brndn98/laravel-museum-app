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

// HOME
Route::get('/', 'FeedController@index');

// LOGIN
Route::get('loginMuser', 'LoginMuser@authenticate');
Route::get('logoutMuser', 'LogoutMuser@logout');

// CONTROLLER ROUTES
//Route::resource('musers', 'MuserController');

// USERS ROLES
Route::get('makeAdmin/{id}', 'AdminMuser@makeAdmin');
Route::get('makeMod/{id}', 'AdminMuser@makeMod');

// USERS
Route::resource('users', 'UserController', ['except' => ['index', 'create']]);
// POSTS
Route::resource('posts', 'PostController');

// FEED OPTIONS
Route::get('recentPosts', 'explorePosts@recent');
Route::get('followingPosts', 'explorePosts@following');
Route::get('popularPosts', 'explorePosts@popular');

// SEARCH
Route::get('explorePosts', 'explorePosts@search');
Route::get('categories/{input}', 'explorePosts@categories');

// LIKE SYSTEM
Route::post('ajaxRequest', 'ajaxRequestController@ajaxRequest');
// COMMENT SYSTEM
Route::resource('comments', 'CommentController');
// FOLLOW SYSTEM
Route::get('follow/{id}', 'followUsers@follow');
Route::get('unfollow/{id}', 'followUsers@unfollow');

// AUTH
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
