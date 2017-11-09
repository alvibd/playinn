<?php

namespace App\Http\Controllers;

use App\Http\Requests\LobbyRequest;
use App\JoiningRequest;
use App\Lobby;
use App\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LobbyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function createLobby(LobbyRequest $request)
    {
        $data = $request->all();

        $lobby = new Lobby();
        $location = Location::findOrFail($data['location_id']);

        $lobby->type = $data['type'];
        $lobby->gender = $data['gender'];
        $lobby->privacy = $data['privacy'];
        $lobby->start_time = $data['start_time'];
        $lobby->end_time = $data['end_time'];
        $lobby->capacity = $data['capacity'];
        $lobby->creator()->associate(Auth::user());
        $lobby->location()->associate($location);
        $lobby->saveOrFail();

        return new JsonResponse(['lobby' => $lobby]);
    }

    public function getLobby(Lobby $lobby)
    {
        return $lobby;
    }

    public function getLobbies()
    {
        return Lobby::all();
    }

}
