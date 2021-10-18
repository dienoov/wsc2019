<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('cors')->group(function () {
    Route::get('events', [EventController::class, 'index']);
    Route::get('organizers/{organizer}/events/{event}', [EventController::class, 'detail']);

    Route::post('login', [AttendeeController::class, 'login']);
    Route::post('logout', [AttendeeController::class, 'logout']);

    Route::post('organizers/{organizer}/events/{event}/registration', [RegistrationController::class, 'register']);
});
