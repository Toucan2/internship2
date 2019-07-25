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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/myaccommodations', 'HomeController@list');
Route::get('/owners', 'HomeController@owners');
Route::get('/mybookings', 'HomeController@myBookings');

Route::get('/book', 'HomeController@displayForm');
Route::post('/book', 'HomeController@storeBooking');

Route::get('/api/home', 'ApiController@sortedIndex');
Route::get('/api/myaccommodations', 'ApiController@sortedList');
Route::get('/api/owners', 'ApiController@sortedOwners');