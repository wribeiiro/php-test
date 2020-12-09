<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SpeakersController;

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
});

Route::group([
    'middleware' => 'apiJwt',
    'prefix'     => 'v1'
], function ($router) {

    // ROUTES AUTH
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth/logout');
    Route::post('auth/refresh', [AuthController::class, 'refresh'])->name('auth/refresh');
    Route::post('auth/me', [AuthController::class, 'me'])->name('auth/me');

    // ROUTES SPEAKER
    Route::get('speakers', [SpeakersController::class, 'index'])->name('speakers/index');
    Route::get('speaker/{id}', [SpeakersController::class, 'show'])->name('speakers/show');
    Route::put('speaker/update/{id}', [SpeakersController::class, 'update'])->name('speakers/update');
    Route::post('speaker/create', [SpeakersController::class, 'store'])->name('speakers/store');
    Route::delete('speaker/delete/{id}', [SpeakersController::class, 'destroy'])->name('speakers/destroy');
});
