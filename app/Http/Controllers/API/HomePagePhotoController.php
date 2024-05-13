<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HomePagePhoto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class HomePagePhotoController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index(Request $request): Collection
    {
        $homepagephotos = HomePagePhoto::orderBy('position', 'desc');
        if ($request->fields) {
            $fields = explode(',', $request->fields);
            $homepagephotos->select($fields);
        }
        if (!$request->inActive) {
            $homepagephotos->where('is_active', true);
        }
        return $homepagephotos->get();
    }

//    public function create(Request $request): TopBanner
//    {
//        $request->validate([
//            'title' => 'required',
//            'image' => 'required',
//        ]);
//
//        $request['position'] = TopBanner::count() + 1;
//
//        return TopBanner::create($request->all());
//    }

    public function show(HomePagePhoto $homepagephoto): HomePagePhoto
    {
        return $homepagephoto;
    }

//    public function update(Request $request, TopBanner $topbanner): TopBanner
//    {
//        $request->validate([
//            'id' => 'required',
//            'title' => 'required',
//            'position' => 'required',
//        ]);
//
//        $topbanner->update($request->all());
//
//        return $topbanner;
//    }

//    public function destroy(TopBanner $topbanner): JsonResponse
//    {
//        $topbanner->delete();
//
//        $topBanners = TopBanner::orderBy('position', 'asc')->get();
//        foreach ($topBanners as $k => $topBanner) {
//            $topBanner->position = $k + 1;
//            $topBanner->save();
//        }
//
//        return response()->json(['message' => 'TopBanner deleted successfully']);
//    }

//    public function position(TopBanner $topbanner, string $action): JsonResponse
//    {
//        $currentPosition = $topbanner->position;
//        $count = TopBanner::count();
//
//        if ($action === 'up' && $currentPosition < $count) {
//            $above = TopBanner::where('position', ($currentPosition + 1))->first();
//            $above->position = $currentPosition;
//            $above->save();
//            $topbanner->position = ($currentPosition + 1);
//            $topbanner->save();
//        }
//
//        if ($action === 'down' && $currentPosition > 0) {
//            $below = TopBanner::where('position', ($currentPosition - 1))->first();
//            $below->position = $currentPosition;
//            $below->save();
//            $topbanner->position = ($currentPosition - 1);
//            $topbanner->save();
//        }
//
//        return response()->json(['message' => 'TopBanner position Updated']);
//    }

//    public function setActive(TopBanner $topbanner, $is_active): JsonResponse
//    {
//        $topbanner->is_active = filter_var($is_active, FILTER_VALIDATE_BOOLEAN);
//        $topbanner->save();
//
//        return response()->json([]);
//    }
}
