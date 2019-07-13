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



// DISPLAY VIEWS ----------------------------------------------------------------

Route::redirect('/', '/accomodations');

Route::get("/accomodations", "AccomodationsController@index");
Route::get('/accomodations/create', 'AccomodationsController@create');
Route::post('/accomodations', 'AccomodationsController@store');
Route::get("/accomodations/{id}", "AccomodationsController@show");
// some more CRUD routes will go here...
Route::delete('/accomodations/{id}', 'AccomodationsController@destroy');
// fake DELETE:
Route::get('/accomodations/delete/{id}', 'AccomodationsController@destroy');

// ------------------------------------------------------------------------------



// DISPLAY JSON -----------------------------------------------------------------

Route::prefix('api')->group(function() {
    Route::redirect('', 'api/accomodations');

    Route::get("accomodations", "ApiController@index");
    Route::get('accomodations/create', 'ApiController@create');
    Route::post('accomodations', 'ApiController@store');
    Route::get("accomodations/{id}", "ApiController@show");
    // some more CRUD routes will go here...
    Route::delete('accomodations/{id}', 'ApiController@destroy');
    // fake DELETE:
    Route::get('accomodations/delete/{id}', 'ApiController@destroy');

    // Route::get('display', 'ApiController@display');
});

// Route::get('/api/display', 'ApiController@display');

// ------------------------------------------------------------------------------
