<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\AuthController;
use App\Http\Controllers\Mobile\AttendenceController;
use App\Http\Controllers\Mobile\EvaluationController;
use App\Http\Controllers\Mobile\HomePageController;

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

//public
Route::post('/MobileLogin', [AuthController::class, 'Mobilelogin']);

//private
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/Attendence', [AttendenceController::class, 'Attendence']);
    Route::get('/Evaluation', [EvaluationController::class, 'Evaluation']);
    Route::get('/HomePage', [HomePageController::class, 'HomePage']);
    
});


