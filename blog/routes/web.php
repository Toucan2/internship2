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

// Route::get('/{id}', function ($id) {
//     return view('welcome');
// });



// DISPLAY JSON ---------------------------------------------------------------

Route::redirect('/', '/accomodations');

// in testing:
Route::get('/accomodations/dashboard', 'AccomodationsController@dashboard');
// -----------

Route::get("/accomodations", "AccomodationsController@index");
Route::get('/accomodations/create', 'AccomodationsController@create');
Route::post('/accomodations', 'AccomodationsController@store');
Route::get("/accomodations/{id}", "AccomodationsController@show");
// some more CRUD routes will go here...
Route::delete('/accomodations/{id}', 'AccomodationsController@destroy');
// fake DELETE:
Route::get('/accomodations/delete/{id}', 'AccomodationsController@destroy');

// ------------------------------------------------------------------------------



// DISPLAY VIEWS ---------------------------------------------------------------

Route::redirect('/api', '/api/accomodations');

Route::get("/api/accomodations", "ApiController@index");
Route::get('/api/accomodations/create', 'ApiController@create');
Route::post('/api/accomodations', 'ApiController@store');
Route::get("/api/accomodations/{id}", "ApiController@show");
// some more CRUD routes will go here...
Route::delete('/api/accomodations/{id}', 'ApiController@destroy');
// fake DELETE:
Route::get('/api/accomodations/delete/{id}', 'ApiController@destroy');

// ------------------------------------------------------------------------------