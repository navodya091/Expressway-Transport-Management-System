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

//Auth routes

Route::post('/login', 'Auth\AuthenticatedSessionController@store')->name('login');
Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');



Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'HomePageController@index');
    // Define more routes for other dashboard sections
});

Route::namespace('App\Modules\Dashboard\Controllers')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');
    // Define more routes for other dashboard sections
});

Route::prefix('bus')->namespace('App\Modules\BusManagement\Controllers')->group(function () {
    Route::get('/', 'BusController@index');
    // Define more routes for other dashboard sections
});
