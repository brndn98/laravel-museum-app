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

Route::get('/', function () {
    return view('landing');
});

Route::get('foo', function () {
    return "Hello World!";
});

/*Route::get('landing', function(){
    return view('landing');
});*/

Route::get('signup', function(){
    return view('signup');
});

Route::get('feed', function(){
    return view('feed');
});

Route::get('explore', function(){
    return view('explore');
});

Route::get('post', function(){
    return view('post');
});

Route::get('share', function(){
    return view('share');
});

Route::get('account', function(){
    return view('account');
});
