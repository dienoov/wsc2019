<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::resource('/events', EventController::class)->only('index', 'store', 'create');

    Route::middleware('check.event')->group(function () {
        Route::resource('/events', EventController::class)->except('index', 'store', 'create');
        Route::resource('/events/{event}/tickets', TicketController::class);
        Route::resource('/events/{event}/channels', ChannelController::class);
        Route::resource('/events/{event}/rooms', RoomController::class);
    });
});

