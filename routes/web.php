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
Route::get('carousel', 'Carousel\CarouselController@index');
Route::post('carousel', 'Carousel\CarouselController@store');
Route::get('enviar', ['as' => 'enviar', function () {
    $data = ['link' => 'http://styde.net'];

    \Mail::send('emails.notification', $data, function ($message) {

        $message->from('email@styde.net', 'Styde.Net');

        $message->to('user@example.com')->subject('Notificación');

    });

    return "Se envío el email";
}]);
