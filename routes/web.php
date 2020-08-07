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

// Route::get('/', function () {
//     return view('index.index');
// });
Route::get('/info', function () {
    echo phpinfo();
});
Route::any('/reg','Login\LoginController@reg');
Route::any('/reg_do','Login\LoginController@reg_do');
Route::any('/login','Login\LoginController@login');
Route::any('/login_do','Login\LoginController@login_do');
Route::any('/center','Login\LoginController@center');
