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

    public function create(Request $request): HomePagePhoto
    {
        $request->validate([
            'image' => 'required',
        ]);

        $request['position'] = HomePagePhoto::count() + 1;

        return HomePagePhoto::create($request->all());
    }

    public function show(HomePagePhoto $homepagephoto): HomePagePhoto
    {
        return $homepagephoto;
    }

    public function update(Request $request, HomePagePhoto $homepagephoto): HomePagePhoto
    {
        $request->validate([
//            'id' => 'required',
//            'title' => 'required',
//            'position' => 'required',
        ]);

        $homepagephoto->update($request->all());

        return $homepagephoto;
    }

    public function destroy(HomePagePhoto $homepagephoto): JsonResponse
    {
        $homepagephoto->delete();

        $homepagephotos = HomePagePhoto::orderBy('position', 'asc')->get();
        foreach ($homepagephotos as $k => $homepagephoto) {
            $homepagephoto->position = $k + 1;
            $homepagephoto->save();
        }

        return response()->json(['message' => 'TopBanner deleted successfully']);
    }

    public function position(HomePagePhoto $homepagephoto, string $action): JsonResponse
    {
        $currentPosition = $homepagephoto->position;
        $count = HomePagePhoto::count();

        if ($action === 'up' && $currentPosition < $count) {
            $above = HomePagePhoto::where('position', ($currentPosition + 1))->first();
            $above->position = $currentPosition;
            $above->save();
            $homepagephoto->position = ($currentPosition + 1);
            $homepagephoto->save();
        }

        if ($action === 'down' && $currentPosition > 0) {
            $below = HomePagePhoto::where('position', ($currentPosition - 1))->first();
            $below->position = $currentPosition;
            $below->save();
            $homepagephoto->position = ($currentPosition - 1);
            $homepagephoto->save();
        }

        return response()->json(['message' => 'TopBanner position Updated']);
    }

    public function setActive(HomePagePhoto $homepagephoto, $is_active): JsonResponse
    {
        $homepagephoto->is_active = filter_var($is_active, FILTER_VALIDATE_BOOLEAN);
        $homepagephoto->save();

        return response()->json([]);
    }
}
