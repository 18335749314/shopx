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
    return view('welcome');
});
Route::get('/info', function () {
    echo phpinfo();
});
Route::get('/reg','Login\LoginController@reg');
Route::post('/reg_do','Login\LoginController@reg_do');
Route::get('/login','Login\LoginController@login');
Route::post('/login_do','Login\LoginController@login_do');
Route::get('/center','Login\LoginController@center');

Route::get('/index','Index\IndexController@index');