<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SpeakersController;
use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\LecturesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'prefix'     => 'v1'
], function ($router) {
    Route::post('auth/login', [AuthController::class, 'login'])->name('auth/login');
    Route::post('auth/loginForm', [AuthController::class, 'loginForm'])->name('auth/loginForm');
    Route::any('auth/logoutForm', [AuthController::class, 'logoutForm'])->name('auth/logoutForm');
});

Route::group([
    'middleware' => 'apiJwt',
    'prefix'     => 'v1'
], function ($router) {

    // ROUTES AUTH
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('auth/refresh', [AuthController::class, 'refresh']);
    Route::post('auth/me', [AuthController::class, 'me']);

    // ROUTES SPEAKER
    Route::get('speakers', [SpeakersController::class, 'index']);
    Route::get('speakers/{id}', [SpeakersController::class, 'show']);
    Route::put('speakers/update/{id}', [SpeakersController::class, 'update']);
    Route::post('speakers/create', [SpeakersController::class, 'store']);
    Route::delete('speakers/delete/{id}', [SpeakersController::class, 'destroy']);

    // ROUTES EVENT
    Route::get('events', [EventsController::class, 'index']);
    Route::get('events/{id}', [EventsController::class, 'show']);
    Route::put('events/update/{id}', [EventsController::class, 'update']);
    Route::post('events/create', [EventsController::class, 'store']);
    Route::delete('events/delete/{id}', [EventsController::class, 'destroy']);

    // ROUTES LECTURE
    Route::get('lectures', [LecturesController::class, 'index']);
    Route::get('lectures/{id}', [LecturesController::class, 'show']);
    Route::put('lectures/update/{id}', [LecturesController::class, 'update']);
    Route::post('lectures/create', [LecturesController::class, 'store']);
    Route::delete('lectures/delete/{id}', [LecturesController::class, 'destroy']);

});
