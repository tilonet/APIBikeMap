<?php

use App\Http\Controllers\GpxTrackController;
use App\Http\Controllers\PoiController;
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
//testroutes
//http://home.tilonet.de/api/poi?lat=0.0&lon=0.0&radius=0&api_token=IhUqhRimreFzOFvaJNPHhKUvhBTzmRiUkNAgalHoYiLqKREBxbZLfOnUxDTn
//http://home.tilonet.de/api/gpxtrack?api_token=IhUqhRimreFzOFvaJNPHhKUvhBTzmRiUkNAgalHoYiLqKREBxbZLfOnUxDTn

Route::group([ 'middleware' => 'auth:api'], function () {

     Route::get('gpxtrack', function () {
         $con = new GpxTrackController();
         $con->index();
     });

     Route::get('poi', function () {
         $con = new PoiController();
         $con->index();
     });
});