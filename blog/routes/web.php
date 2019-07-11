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

// Route::view('/', 'first');

Route::get("/", "TestController@list");
Route::get("/{id}", "TestController@show");

Route::post('/', 'TestController@post');

// Route::get('/{id}', function ($id) {
//     return view('welcome');
// });

// Route::get('/mydatabase', function () {
//     return view('first');
// });
