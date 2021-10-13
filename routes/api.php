<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\BackendController;
use App\Http\Middleware\DefaultApiAcceptJson;
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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('v1/comm/{code}/stream',[ApiController::class,'apiProcessing'])
    ->middleware(DefaultApiAcceptJson::class);
Route::get('v1/comm/{code}/stream/{time}/{type}/{value}',[ApiController::class,'apiProcessingGet']);
