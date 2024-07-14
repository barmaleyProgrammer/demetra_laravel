<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(Request $request): Collection
    {
        return User::withTrashed()->get();
    }

    public function create(Request $request): User
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        return User::create($request->all());
    }

    public function show(User $user): User
    {
        return $user;
    }

    public function update(Request $request, User $user): User
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'role' => 'required',
            // 'password' => 'required',
        ]);

        $user->update($request->all());

        return $user;
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function restore(User $user): JsonResponse
    {
        $user->restore();

        return response()->json(['message' => 'User restored successfully']);
    }
}
