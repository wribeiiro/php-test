<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpeakersController;

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
Route::get('/', [AuthController::class, 'viewLogin']);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth/logout');
Route::get('speakers/list', [SpeakersController::class, 'viewSpeakers'])->name('speakers/list');

Route::post('auth/login', [AuthController::class, 'login'])->name('auth/login');
