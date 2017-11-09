<?php

namespace App\Http\Controllers;

use App\AppConstants;
use App\JoiningRequest;
use App\Lobby;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JoiningRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function joinPublicLobby($userId, $lobbyId)
    {
        $lobby = Lobby::findOrFail($lobbyId)->wherePrivacy(false);
        $user = User::findOrFail($userId);
        if(JoiningRequest::whereUser($userId)->andWhereLobby($lobbyId))
        {
            return new JsonResponse(['message' => 'Already Requested to Join'], 403);
        }

        $lobbyRequest = new JoiningRequest();

        $lobbyRequest->users()->associate($user);
        $lobbyRequest->lobbies()->associate($lobby);
        $lobbyRequest->status = AppConstants::JOINNING_STATUS['Requested'];
        $lobbyRequest->saveOrFail();

        return new JsonResponse(['message' => 'Successfully requested to join'], 200);
    }

    public function inviteToLobby($userId, $lobbyId)
    {
        $lobby = Lobby::findOrFail($lobbyId)->wherePrivacy(true);
        $user = User::findOrFail($userId);

        $lobbyRequest = new JoiningRequest();

        $lobbyRequest->users()->associate($user);
        $lobbyRequest->lobbies()->associate($lobby);
        $lobbyRequest->status = AppConstants::JOINNING_STATUS['Invited'];

        $lobbyRequest->saveOrFail();

        return new JsonResponse(['message' => 'Invited Successfully'], 200);
    }

    public function getJoiningRequests($lobbyId)
    {
        return JoiningRequest::whereLobby($lobbyId)
            ->andWherePrivacy(false)
            ->andWhereStatus(AppConstants::JOINNING_STATUS['Requested'])->get();
    }

    public function getInvitations($userId)
    {
        return JoiningRequest::whereUser($userId)->whereStatus(AppConstants::JOINNING_STATUS['Invited'])->get();
    }
}
