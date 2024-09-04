<?php

use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\GalleryPhotoController;
use App\Http\Controllers\API\NewoneController;
use App\Http\Controllers\API\HomePagePhotoController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::group(['middleware' => 'api'], function () {
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);
    Route::middleware('auth:api')->group(function () {
        Route::get('/auth/whoami', [AuthController::class, 'whoami']);
    });
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'users',
    'controller' => UserController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('/{user}', 'show');
    Route::post('', 'create');
    Route::put('/{user}', 'update');
    Route::delete('/{user}', 'destroy');
    Route::get('/{user}/restore', 'restore')->withTrashed();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'service',
    'controller' => ServiceController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('/{service}', 'show');
    Route::put('/{service}', 'update')->middleware('auth:sanctum');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'homepagephotos',
    'controller' => HomePagePhotoController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('/{homepagephoto}', 'show');
    Route::post('', 'create')->middleware('auth:sanctum');
    Route::put('/{homepagephoto}', 'update')->middleware('auth:sanctum');
    Route::delete('/{homepagephoto}', 'destroy')->middleware('auth:sanctum');
//    Route::get('/{photohomepage}/restore', 'restore');
    Route::get('/{homepagephoto}/position/{action}', 'position')->middleware('auth:sanctum');
    Route::get('/{homepagephoto}/active/{is_active}', 'setActive')->middleware('auth:sanctum');
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'news',
    'controller' => NewoneController::class
], function ($router) {
    Route::get('', 'index');
//    Route::get('', 'index');
    Route::get('/{newone}', 'show');
    Route::post('', 'create')->middleware('auth:sanctum');
    Route::put('/{newone}', 'update')->middleware('auth:sanctum');
    Route::delete('/{newone}', 'destroy')->middleware('auth:sanctum');
    Route::get('/{newone}/active/{is_active}', 'setActive')->middleware('auth:sanctum');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'contact',
    'controller' => ContactController::class
], function ($router) {
    Route::get('', 'index');
    Route::put('', 'update')->middleware('auth:sanctum');
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'room',
    'controller' => RoomController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('{room}', 'show');
    Route::post('', 'create')->middleware('auth:sanctum');
    Route::put('{room}', 'update')->middleware('auth:sanctum');
    Route::delete('{room}', 'destroy')->middleware('auth:sanctum');

    Route::get('{room}/photo', 'showPhoto');
    Route::post('{room}/photo', 'createPhoto')->middleware('auth:sanctum');
    Route::put('{room}/photo/{roomPhoto}', 'updatePhoto')->middleware('auth:sanctum');
    Route::delete('{room}/photo/{roomPhoto}', 'destroyPhoto')->middleware('auth:sanctum');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'place',
    'controller' => GalleryPhotoController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('{place}', 'show');
    Route::put('{place}', 'update')->middleware('auth:sanctum');
    Route::post('', 'createPlace');
//    Route::put('{place}/photo/{placePhoto}/is_main', 'update');
    Route::delete('{place}', 'destroy')->middleware('auth:sanctum');

    Route::get('{place}/photo', 'showPhoto');
    Route::post('{place}/photo', 'createPhoto')->middleware('auth:sanctum');
    Route::put('{place}/photo/{placePhoto}', 'updatePhoto')->middleware('auth:sanctum');
    Route::delete('{place}/photo/{placePhoto}', 'destroyPhoto')->middleware('auth:sanctum');
});
