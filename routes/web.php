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
    Route::get('/show/{id}', 'BusController@show')->name('bus.show');
    Route::get('/create', 'BusController@create')->name('bus.create');
    Route::post('/store', 'BusController@store')->name('bus.store');
    Route::get('/edit/{id}', 'BusController@edit')->name('bus.edit');
    Route::post('/update/{id}', 'BusController@update')->name('bus.update');
    Route::post('/update-bus-status', 'BusController@updateBusStatus')->name('bus.status');
    Route::delete('/delete/{id}', 'BusController@delete')->middleware('auth')->name('bus.delete');
    
});

    Route::prefix('user')->namespace('App\Modules\UserManagement\Controllers')->middleware('auth')->group(function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/show/{id}', 'UserController@show')->name('user.show');
    Route::get('/create', 'UserController@create')->name('user.create');
    Route::post('/store', 'UserController@store')->name('user.store');
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/update/{id}', 'UserController@update')->name('user.update');
    Route::post('/update-user-status', 'UserController@updateUserStatus')->name('user.status');
    Route::delete('/delete/{id}', 'UserController@delete')->middleware('auth')->name('user.delete');
    
});

Route::prefix('route')->namespace('App\Modules\RouteManagement\Controllers')->middleware('auth')->group(function () {
    Route::get('/', 'RouteController@index')->name('route.index');
    Route::get('/show/{id}', 'RouteController@show')->name('route.show');
    Route::get('/create', 'RouteController@create')->name('route.create');
    Route::post('/store', 'RouteController@store')->name('route.store');
    Route::get('/edit/{id}', 'RouteController@edit')->name('route.edit');
    Route::post('/update/{id}', 'RouteController@update')->name('route.update');
    Route::post('/update-route-status', 'RouteController@updateRouteStatus')->name('route.status');
    Route::delete('/delete/{id}', 'RouteController@delete')->name('route.delete');
    
});

Route::prefix('trip')->namespace('App\Modules\TripManagement\Controllers')->middleware('auth')->group(function () {
    Route::get('/', 'TripController@index')->name('trip.index');
    Route::get('/show/{id}', 'TripController@show')->name('trip.show');
    Route::get('/create/{id}', 'TripController@create')->name('trip.create');
    Route::post('/store', 'TripController@store')->name('trip.store');
    Route::get('/edit/{id}', 'TripController@edit')->name('trip.edit');
    Route::post('/update/{id}', 'TripController@update')->name('trip.update');
    Route::post('/update-trip-status', 'TripController@updateTripStatus')->name('trip.status');
    Route::delete('/delete/{id}', 'TripController@delete')->name('trip.delete');
    
});

Route::prefix('report')->middleware(['auth', 'user.type:' . UserType::USER_TYPE_MANAGER . '|' . UserType::USER_TYPE_OWNER])
    ->namespace('App\Modules\ReportManagement\Controllers')
    ->group(function () {
        Route::get('/', 'ReportController@index')->name('report.index');
        Route::get('/generate-report', 'ReportController@generateReport')->name('report.generate');
    
});
