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

Route::get('feed', function(){
    return view('feed');
});

Route::get('post', function(){
    return view('post');
});
