<?php

//use App\Http\Controllers\API\AboutController;
//use App\Http\Controllers\API\AdvantageController;
//use App\Http\Controllers\API\AgreementController;
use App\Http\Controllers\API\AuthController;
//use App\Http\Controllers\API\BannerController;
//use App\Http\Controllers\API\ContactController;
//use App\Http\Controllers\API\FaqController;
//use App\Http\Controllers\API\IndicatorController;
//use App\Http\Controllers\API\NeuronNetworkController;
use App\Http\Controllers\API\NewoneController;
use App\Http\Controllers\API\PhotoHomePageController;
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
    'prefix' => 'banners',
    'controller' => BannerController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('/{banner}', 'show')->withTrashed();
    Route::post('', 'create');
    Route::put('/{banner}', 'update')->withTrashed();
    Route::delete('/{banner}', 'destroy');
    Route::get('/{banner}/restore', 'restore')->withTrashed();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'photohomepage',
    'controller' => PhotoHomePageController::class
], function ($router) {
    Route::get('', 'index');
//    Route::get('/{photohomepage}', 'show');
//    Route::post('', 'create');
//    Route::put('/{photohomepage}', 'update');
//    Route::delete('/{photohomepage}', 'destroy');
//    Route::get('/{photohomepage}/restore', 'restore');
//    Route::get('/{photohomepage}/position/{action}', 'position');
//    Route::get('/{photohomepage}/active/{is_active}', 'setActive');
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
    'prefix' => 'agreement',
    'controller' => AgreementController::class
], function ($router) {
    Route::get('/{agreement}', 'show');
    Route::put('/{agreement}', 'update');
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
    'prefix' => 'faq',
    'controller' => FaqController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('/category/{category}', 'showCategory');
    Route::post('/category', 'createCategory');
    Route::put('/category/{category}', 'updateCategory');
    Route::delete('/category/{category}', 'destroyCategory');

    Route::get('/{faq}', 'showFaq');
    Route::post('/', 'createFaq');
    Route::put('/{faq}', 'updateFaq');
    Route::delete('/{faq}', 'destroyFaq');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'advantages',
    'controller' => AdvantageController::class
], function ($router) {
    Route::get('', 'index');
    Route::post('', 'create');
    Route::put('/{advantage}', 'update');
    Route::delete('/{advantage}', 'destroy');
    Route::get('/{advantage}/active/{is_active}', 'setActive');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'neuron',
    'controller' => NeuronNetworkController::class
], function ($router) {
    Route::get('{neuron}', 'index');
//    Route::get('/{neuron}', 'show');
    Route::post('', 'create');
    Route::put('/{neuron}', 'update');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'indicator',
    'controller' => IndicatorController::class
], function ($router) {
    Route::get('', 'index');
    Route::get('/{indicator}', 'show');
    Route::put('/{indicator}', 'update');
    Route::get('/{indicator}/active/{is_active}', 'setActive');
});
