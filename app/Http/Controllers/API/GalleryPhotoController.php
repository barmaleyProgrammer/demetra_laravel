<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\PlacePhoto;
use Illuminate\Http\JsonResponse;

class GalleryPhotoController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['index']]);
    }

    public function index(Request $request): array
    {
        return Place::with('main_photo')->get()->toArray();
    }

    public function createPlace(Request $request): Place
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required'
        ]);

        $place = Place::create($request->all());
        PlacePhoto::create([
            'gallery_place_id' => $place->id,
            'image' => $request->input('image'),
            'is_main' => true
        ]);

        return $place;
    }

    public function show(Place $place): Place
    {
        return $place;
    }
//
//    public function create(Request $request): Room
//    {
//        $request->validate([
//            'image' => 'required',
//        ]);
//
//        return Room::create($request->all());
//    }
//
    public function destroy(Place $place): JsonResponse
    {
        $place->delete();

        return response()->json(['message' => 'Photo deleted successfully']);
    }
//
    public function updatePlace(Request $request, Place $place): Place
    {
//        $request->validate([
//            'image' => 'required',
//            'id' => 'required',
//        ]);
        $place = PlacePhoto::where('is_main', $place->gallery_place_id)->get()->toArray();

        return $place;
    }

    public function showPhoto(Place $place): array
    {
        return PlacePhoto::where('gallery_place_id', $place->id)->get()->toArray();
    }
//
//
//    public function createPhoto(Room $room, Request $request): RoomPhoto
//    {
//        $request->validate([
//            'room_id' => 'required',
//            'image' => 'required',
//        ]);
//
//        return RoomPhoto::create($request->all());
//    }
//
//    public function updatePhoto(Request $request, Room $room, RoomPhoto $roomPhoto): RoomPhoto
//    {
//        $request->validate([
//            'room_id' => 'required',
//            'image' => 'required',
//            'id' => 'required',
//        ]);
//
//        $roomPhoto->update($request->all());
//
//        return $roomPhoto;
//    }
//
//    public function destroyPhoto(Room $room, RoomPhoto $roomPhoto): JsonResponse
//    {
//        $roomPhoto->delete();
//
//        return response()->json(['message' => 'Photo deleted successfully']);
//    }

}
