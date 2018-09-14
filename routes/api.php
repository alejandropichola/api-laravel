<?php

use Illuminate\Http\Request;

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
Route::resource('/', 'Home\HomeController@index');
Route::resource('countries', 'Countries\CountriesController@index', ['only'=> ['index', 'show']]);
Route::resource('countries/{country}/subdivisions', 'Countries\SubdivisionsController', ['only' => ['index']]);
Route::resource('carousel', 'Carousel\CarouselController', ['only'=> ['index', 'store']]);
