<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationWarongWaremController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('reservations', ReservationController::class);
// routes/api.php

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/create-reservation', [ReservationWarongWaremController::class, 'store']);
Route::post('/user', [AuthController::class, 'user']);
Route::post('/getdata', [ReservationWarongWaremController::class, 'getData']);
Route::put('/reserve', [ReservationWarongWaremController::class, 'reserve']);
Route::put('/reject', [ReservationWarongWaremController::class, 'reject']);
Route::put('/change-time', [ReservationWarongWaremController::class, 'changeReservationTime']);
