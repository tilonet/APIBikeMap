<?php

use Illuminate\Http\Request;
use App\Http\Controllers\GpxTrackController;

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
// http://192.168.2.103/api/gpxtrack?api_token=IhUqhRimreFzOFvaJNPHhKUvhBTzmRiUkNAgalHoYiLqKREBxbZLfOnUxDTn
Route::group([ 'middleware' => 'auth:api'], function () {
    /*Route::resource('/gpxtrack', 'GpxTrackController',
        ['except' => ['create', 'store', 'update', 'destroy']]);*/

    Route::get('gpxtrack/{user}', function () {
        return Response::json(['status' => 'test']);
    });

});


Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '6',
        'redirect_uri' => '192.168.2.103/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('192.168.2.103/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('192.168.2.103/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '6',
            'client_secret' => 'r1GdY77NkZ0in0kKGPNVXKx0wBnT0TbZzGrvCOjd',
            'redirect_uri' => '192.168.2.103/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

/*Route::middleware('auth:api')->get('/usertest', function () {
   return Response::json(['status' => 'test']);
});

Route::resource('gpxtrack', 'GpxTrackController',
                ['except' => ['create', 'store', 'update', 'destroy']]);

Route::resource('poi', 'PoiController',
                ['only' => ['index', 'show']]);*/
