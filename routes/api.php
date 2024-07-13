<?php

//use App\Http\Controllers\API\AboutController;
//use App\Http\Controllers\API\AdvantageController;
//use App\Http\Controllers\API\AgreementController;
use App\Http\Controllers\API\AuthController;
//use App\Http\Controllers\API\BannerController;
//use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\GalleryPhotoController;
//use App\Http\Controllers\API\IndicatorController;
//use App\Http\Controllers\API\NeuronNetworkController;
use App\Http\Controllers\API\NewoneController;
use App\Http\Controllers\API\HomePagePhotoController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'controller' => AuthController::class
], function ($router) {
    Route::post('login', 'login');
    Route::get('logout', 'logout');
    Route::get('refresh', 'refresh');
    Route::get('whoami', 'whoami');
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
    'prefix' => 'homepagephotos',
    'controller' => HomePagePhotoController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('/{homepagephoto}', 'show');
    Route::post('', 'create');
    Route::put('/{homepagephoto}', 'update');
    Route::delete('/{homepagephoto}', 'destroy');
//    Route::get('/{photohomepage}/restore', 'restore');
    Route::get('/{homepagephoto}/position/{action}', 'position');
    Route::get('/{homepagephoto}/active/{is_active}', 'setActive');
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'news',
    'controller' => NewoneController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('/{newone}', 'show');
    Route::post('', 'create');
    Route::put('/{newone}', 'update');
    Route::delete('/{newone}', 'destroy');
    Route::get('/{newone}/active/{is_active}', 'setActive');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'about',
    'controller' => AboutController::class
], function ($router) {
    Route::get('/{about}', 'show');
    Route::put('/{about}', 'update');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'contact',
    'controller' => ContactController::class
], function ($router) {
    Route::get('', 'index');
    Route::put('', 'update');
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'room',
    'controller' => RoomController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('{room}', 'show');
    Route::post('', 'create');
    Route::put('{room}', 'update');
    Route::delete('{room}', 'destroy');

    Route::get('{room}/photo', 'showPhoto');
    Route::post('{room}/photo', 'createPhoto');
    Route::put('{room}/photo/{roomPhoto}', 'updatePhoto');
    Route::delete('{room}/photo/{roomPhoto}', 'destroyPhoto');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'place',
    'controller' => GalleryPhotoController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('{place}', 'show');
    Route::put('{place}', 'update');
    Route::post('', 'createPlace');
//    Route::put('{place}/photo/{placePhoto}/is_main', 'update');
    Route::delete('{place}', 'destroy');

    Route::get('{place}/photo', 'showPhoto');
    Route::post('{place}/photo', 'createPhoto');
    Route::put('{place}/photo/{placePhoto}', 'updatePhoto');
    Route::delete('{place}/photo/{placePhoto}', 'destroyPhoto');
});
