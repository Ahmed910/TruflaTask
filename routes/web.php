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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('top-rated-movies','MoviesController@index')->name('movies.index');
Route::get('all_movies','MoviesController@all_movies')->name('movies.all_movies');
Route::get('movies','MoviesController@getMoviesListByCategoryId');
Route::get('sort-movies','MoviesController@sortMovies');
