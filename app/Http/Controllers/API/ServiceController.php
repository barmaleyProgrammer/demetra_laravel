<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['index']]);
    }

    public function index(Request $request): array
    {
        return Service::all()->toArray();
    }

    public function show(Service $service): Service
    {
        return $service;
    }

    public function showPhoto(Room $room): array
    {
        return RoomPhoto::where('room_id', $room->id)->get()->toArray();
    }

    public function update(Request $request, Service $service): Service
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'id' => 'required',
        ]);

        $service->update($request->all());

        return $service;
    }

    public function updatePhoto(Request $request, Room $room, RoomPhoto $roomPhoto): RoomPhoto
    {
        $request->validate([
            'room_id' => 'required',
            'image' => 'required',
            'id' => 'required',
        ]);

        $roomPhoto->update($request->all());

        return $roomPhoto;
    }

}
