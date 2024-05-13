<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Database\Eloquent\Collection;


class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['show']]);
    }

    public function show(About $about): About
    {
        return $about;
    }

    public function update(Request $request, About $about): About
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $about->update($request->all());

        return $about;
    }
}
