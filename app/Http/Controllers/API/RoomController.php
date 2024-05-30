<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Http\JsonResponse;

class RoomController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['index']]);
    }

    public function index(Request $request): array
    {
        return Room::all()->toArray();
    }

    public function show(Room $room): Room
    {
        return $room;
    }

    public function create(Request $request): Room
    {
        $request->validate([
            'image' => 'required',
        ]);

        return Room::create($request->all());
    }

    public function destroy(Room $room): JsonResponse
    {
        $room->delete();

        return response()->json(['message' => 'Photo deleted successfully']);
    }

    public function showPhoto(Room $room): array
    {
        return RoomPhoto::where('room_id', $room->id)->get()->toArray();
    }

    public function update(Request $request, Room $room): Room
    {
        $request->validate([
            'image' => 'required',
            'id' => 'required',
        ]);

        $room->update($request->all());

        return $room;
    }
    public function createPhoto(Room $room, Request $request): RoomPhoto
    {
        $request->validate([
            'room_id' => 'required',
            'image' => 'required',
        ]);

        return RoomPhoto::create($request->all());
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

    public function destroyPhoto(Room $room, RoomPhoto $roomPhoto): JsonResponse
    {
        $roomPhoto->delete();

        return response()->json(['message' => 'Photo deleted successfully']);
    }

}
