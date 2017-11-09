<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function setLocation(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:50",
            'latitude' => 'required|numeric',
            'longitude' => 'reuired|numeric'
        ]);
        $data = $request->all();

        $location = new Location();
        $location->name = $data['name'];
        $location->latitude = $data['latitude'];
        $location->longitude = $data['longitude'];
        $location->saveOrFail();

        return new JsonResponse([
           'message' => 'successfully added location'
        ], 200);
    }

    public function getLocations()
    {
        $locations = Location::all();
        return ['locations' => $locations];
    }
}
