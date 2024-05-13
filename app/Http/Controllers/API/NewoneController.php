<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newone;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class NewoneController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index(Request $request): Collection
    {
        $news = Newone::orderBy('id');
        if ($request->fields) {
            $fields = explode(',', $request->fields);
            $news->select($fields);
        }
        if (!$request->inActive) {
            $news->where('is_active', true);
        }

        return $news->get();
    }

//    public function create(Request $request): Newone
//    {
//        $request->validate([
//            'title' => 'required',
//            'body' => 'required',
//            'publish_date' => 'required'
//        ]);
//
//        return Newone::create($request->all());
//    }

    public function show(Newone $newone): Newone
    {
        return $newone;
    }

    public function update(Request $request, Newone $newone): Newone
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
        ]);

        $newone->update($request->all());

        return $newone;
    }

    public function destroy(Newone $newone): JsonResponse
    {
        $newone->delete();

        return response()->json(['message' => 'New deleted successfully']);
    }

    public function setActive(Newone $newone, $is_active): JsonResponse
    {
        $newone->is_active = filter_var($is_active, FILTER_VALIDATE_BOOLEAN);
        $newone->save();

        return response()->json([]);
    }
}
