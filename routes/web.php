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

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/donor', 'Auth\LoginController@showDonorLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/donor', 'Auth\RegisterController@showDonorRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/donor', 'Auth\LoginController@donorLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/donor', 'Auth\RegisterController@createDonor');


Route::group(['middleware' => 'auth:donor'], function () {
    Route::view('/donor', 'donor');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::get('logout', 'Auth\LoginController@logout');
