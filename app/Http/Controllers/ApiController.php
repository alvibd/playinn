<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    //controller for api testing
    public function success()
    {
        return new JsonResponse(['success' => 'Your api link has worked successfully'], 200);
    }

    public function sendJson()
    {
        $lobby = [];
        $lobby[] = [
            'id' => 1110,
            'AdminImage' => 'admin0.jpg',
            'Latitude' => 23.751411,
            'Longitude' => 90.380050,
            'LobbyDescription' => 'just a description of games',
            'PlayingTime' => '16-10-2017 at 3.00 pm',
            'TotalPlayersRequired' => 12,
            'PlayersIn' => 6,
            'PlayersNeeded' => 4,
            'SportType' => 'Football',
            'SoonOrNot' => false,
            'OrganizerOrNot' => true,
            'InOrNot' => false
        ];

        $lobby[] = [
            'id' => 1111,
            'AdminImage' => 'admin1.jpg',
            'Latitude' => 23.751200,
            'Longitude' => 90.387013,
            'LobbyDescription' => 'just a description of games 1',
            'PlayingTime' => '17-10-2017 at 3.00 pm',
            'TotalPlayersRequired' => 12,
            'PlayersIn' => 6,
            'PlayersNeeded' => 4,
            'SportType' => 'Football',
            'SoonOrNot' => false,
            'OrganizerOrNot' => false,
            'InOrNot' => true
        ];

        $lobby[] = [
            'id' => 1112,
            'AdminImage' => 'admin2.jpg',
            'Latitude' => 23.752359,
            'Longitude' => 90.380769,
            'LobbyDescription' => 'just a description of games 2',
            'PlayingTime' => '18-10-2017 at 3.00 pm',
            'TotalPlayersRequired' => 12,
            'PlayersIn' => 6,
            'PlayersNeeded' => 4,
            'SportType' => 'Football',
            'SoonOrNot' => false,
            'OrganizerOrNot' => false,
            'InOrNot' => false
        ];

        return response()->json(['LobbyClass' => $lobby]);
    }

    public function apiLogin(Request $request)
    {

    }
}
