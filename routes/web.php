<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthFormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LecturesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [AuthFormController::class, 'viewLogin'])->name('login');
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('speakers/list', [SpeakersController::class, 'viewSpeakers']);
Route::get('events/list', [EventsController::class, 'viewEvents']);
Route::get('lectures/list', [LecturesController::class, 'viewLectures']);
