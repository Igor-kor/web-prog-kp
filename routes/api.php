<?php

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

Route::apiResources(
    [
        'coin'=>App\Http\Controllers\Resource\CoinController::class,
        'coinuser'=>App\Http\Controllers\Resource\CoinUser::class,
        'mark'=>App\Http\Controllers\Resource\MarkController::class,
        'country'=>App\Http\Controllers\Resource\Country::class,
    ]
);
