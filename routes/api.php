<?php

use App\Http\Controllers\PassengerController;
use App\Http\Controllers\AirplaneController;
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



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::prefix('api')->group(function () {
Route::controller(PassengerController::class)->group(function () {
    Route::get('/passenger', 'index');
    Route::post('/passenger', 'store');
    Route::put('/passenger/{id}', 'update');
    Route::delete('/passenger/{id}', 'delete');
});

Route::controller(AirplaneController::class)->group(function () {
    Route::get('/airplane','index');
    Route::post('/airplane', 'store');
});
// });
