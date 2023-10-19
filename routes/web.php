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
Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('/', 'LoginController@loginView')->name('login.view');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    // Define more routes for other dashboard sections
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/home', 'HomePageController@index')->name('home');
    // Define more routes for other dashboard sections
});

Route::namespace('App\Modules\Dashboard\Controllers')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // Define more routes for other dashboard sections
});

Route::prefix('bus')->namespace('App\Modules\BusManagement\Controllers')->group(function () {
    Route::get('/', 'BusController@index')->name('bus.index');
    Route::get('/create', 'BusController@create')->name('bus.create');
    Route::post('/store', 'BusController@store')->name('bus.store');
    Route::post('/update-bus-status', 'BusController@updateBusStatus')->name('bus.status');
    // Define more routes for other dashboard sections
});

Route::prefix('route')->namespace('App\Modules\RouteManagement\Controllers')->group(function () {
    Route::get('/', 'RouteController@index')->name('route.index');
    Route::get('/create', 'RouteController@create')->name('route.create');
    Route::post('/store', 'RouteController@store')->name('route.store');
    Route::post('/update-route-status', 'RouteController@updateRouteStatus')->name('route.status');
    // Define more routes for other dashboard sections
});

Route::prefix('trip')->namespace('App\Modules\TripManagement\Controllers')->group(function () {
    Route::get('/', 'TripController@index')->name('trip.index');
    Route::get('/create/{route_id}', 'TripController@create')->name('trip.create');
    Route::post('/store', 'TripController@store')->name('trip.store');
    Route::post('/update-trip-status', 'TripController@updateTripStatus')->name('trip.status');
    // Define more routes for other dashboard sections
});
