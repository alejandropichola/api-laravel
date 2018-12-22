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

Route::get('/', 'Home\HomeController@index');
Route::get('countries', 'Countries\CountriesController@index');
Route::get('countries/{country}/subdivisions', 'Countries\SubdivisionsController@index');
Route::get('site/{siteId}/carousel', 'Carousel\CarouselController@index');
Route::post('carousel-create', 'Carousel\CarouselController@createCarousel');
Route::get('site/{siteId}/product-category', 'Product\ProductCategoryController@index');
Route::post('product-category', 'Product\ProductCategoryController@store');
Route::delete('product-category/$id', 'Product\ProductCategoryController@destroy');
Route::get('site/{siteId}/product-category/{productCategoryId}/product', 'Product\ProductController@index');
Route::post('product', 'Product\ProductController@store');
Route::delete('product/$id', 'Product\ProductController@destroy');
Route::get('site/{siteId}/event', 'Event\EventController@index');
Route::post('event', 'Event\EventController@store');
Route::delete('event/{eventId}', 'Event\EventController@destroy');
Route::post('/send', 'Notification\NotificationController@send');
