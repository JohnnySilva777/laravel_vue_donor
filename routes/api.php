<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource('donations', \Api\DonationController::class)
//    ->names('donations');

Route::post('donations/store', 'Api\DonationController@store')
    ->name('donations.store');

Route::get('donors/{id}/donations', 'Api\DonorController@donations')
    ->name('donors.donations');

Route::get('organizations', 'Api\OrganizationController@index')
    ->name('organizations.index');
