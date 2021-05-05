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


Route::group(['middleware' => 'auth:donor', 'prefix' => 'donor'], function () {
    Route::view('/donor', 'donor');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin.index');
    Route::prefix('/organizations')->group(function (){
        Route::get('/', 'Admin\OrganizationController@index')->name('organizations.index');
        Route::match(['post', 'get'], '/create',   'Admin\OrganizationController@create')->name('organizations.create');
        Route::match(['post', 'get'], '/edit/{id}',     'Admin\OrganizationController@edit')->name('organizations.edit');
        Route::delete('/delete/{id}',   'Admin\OrganizationController@remove')->name('organizations.delete');
    });
});

Route::get('logout', 'Auth\LoginController@logout');
