<?php

use Illuminate\Support\Facades\Route;
use App\Models\UserType;

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
    Route::get('/', 'LoginController@loginView')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    
});

Route::namespace('App\Http\Controllers')->middleware('auth')->group(function () {
    Route::get('/home', 'HomePageController@index')->name('home');
    
});


Route::middleware(['auth', 'user.type:' . UserType::USER_TYPE_MANAGER . '|' . UserType::USER_TYPE_OWNER])
    ->namespace('App\Modules\Dashboard\Controllers')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        
});


Route::prefix('bus')->namespace('App\Modules\BusManagement\Controllers')->middleware('auth')->group(function () {
    Route::get('/', 'BusController@index')->name('bus.index');
    Route::get('/create', 'BusController@create')->name('bus.create');
    Route::post('/store', 'BusController@store')->name('bus.store');
    Route::post('/update-bus-status', 'BusController@updateBusStatus')->name('bus.status');
    
});

Route::prefix('route')->namespace('App\Modules\RouteManagement\Controllers')->middleware('auth')->group(function () {
    Route::get('/', 'RouteController@index')->name('route.index');
    Route::get('/create', 'RouteController@create')->name('route.create');
    Route::post('/store', 'RouteController@store')->name('route.store');
    Route::post('/update-route-status', 'RouteController@updateRouteStatus')->middleware('auth')->name('route.status');
    
});

Route::prefix('trip')->namespace('App\Modules\TripManagement\Controllers')->middleware('auth')->group(function () {
    Route::get('/', 'TripController@index')->name('trip.index');
    Route::get('/create/{route_id}', 'TripController@create')->name('trip.create');
    Route::post('/store', 'TripController@store')->name('trip.store');
    Route::post('/update-trip-status', 'TripController@updateTripStatus')->name('trip.status');
    
});

Route::prefix('report')->middleware(['auth', 'user.type:' . UserType::USER_TYPE_MANAGER . '|' . UserType::USER_TYPE_OWNER])
    ->namespace('App\Modules\ReportManagement\Controllers')
    ->group(function () {
        Route::get('/', 'ReportController@index')->name('report.index');
        Route::get('/generate-report', 'ReportController@generateReport')->name('report.generate');

        
});
