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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login')->name('api.login');
    Route::post('logout', 'AuthController@logout')->name('api.logout');
    Route::post('refresh', 'AuthController@refresh')->name('api.refresh');
    Route::get('me', 'AuthController@me')->name('api.get.user');
    Route::post('register', 'AuthController@register')->name('api.register');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function (){
    Route::post('create/lobby', 'LobbyController@createLobby')->name('api.create.lobby');
    Route::get('lobby/{lobby}', 'LobbyController@getLobby')->name('api.lobby');
    Route::get('lobbies', 'LobbyController@getLobbies')->name('api.lobbies');
    Route::post('join/public/lobby/{userId}/{lobbyId}', 'JoiningRequestController@joinPublicLobby')->name('api.public.join');
    Route::post('join/private/lobby/{userId}/{lobbyId}', 'JoiningRequestController@inviteToLobby')->name('api.public.join');
    Route::get('lobby/join/requests/{lobbyId}', 'JoiningRequestController@getJoiningRequests')->name('api.join.request');
    Route::get('invitations/{userId}', 'JoiningRequestController@getInvitations')->name('api.invitations');

    Route::post('/set/location', 'LocationController@setLocation')->name('api.set.location');
    Route::get('/locations', 'LocationController@getLocations')->name('api.locations');
});

Route::get('/success', 'ApiController@success')->name('test.success');
Route::get('/lobbies', 'ApiController@sendJson')->name('test.response');
