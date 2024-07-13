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

    public function update(Request $request, Place $place): Place
    {
        $request->validate([
            'id' => ['numeric', 'required'],
            'name' => ['string', 'required'],
            'photo.id' => ['numeric', 'required'],
            'photo.is_main' => ['bool', 'required'],
            'photo.image' => ['string', 'required'],
        ]);
        $place->name = $request->name;
        $place->save();
        $placePhoto = PlacePhoto::find($request->photo['id']);
        $placePhoto->is_main = $request->photo['is_main'];
        $placePhoto->image = $request->photo['image'];
        $placePhoto->save();

        return $place;
    }

    public function showPhoto(Place $place): array
    {
        return PlacePhoto::where('gallery_place_id', $place->id)->get()->toArray();
    }
//
//
    public function createPhoto(Request $request, Place $place): PlacePhoto
    {
        $request->validate([
            'gallery_place_id' => 'required',
            'image' => 'required',
        ]);

        return PlacePhoto::create([
            'gallery_place_id' => $place->id,
            'image' => $request->input('image'),
            'is_main' => false,
        ]);
    }
//
    public function updatePhoto(Request $request, Place $place, PlacePhoto $placePhoto): PlacePhoto
    {
        $request->validate([
            'image' => 'required',
        ]);

        $placePhoto->update([
            'gallery_place_id' => $place->id,
            'image' => $request->input('image'),
        ]);

        return $placePhoto;
    }

    public function destroyPhoto(Place $place, PlacePhoto $placePhoto): JsonResponse
    {
        $placePhoto->delete();

        return response()->json(['message' => 'Photo deleted successfully']);
    }

}
