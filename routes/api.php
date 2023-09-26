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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(["prefix" => "v1"], function () {
    // // Route::post('signin', "App\Http\Controllers\AuthController@login");
    // // Route::post('verifyDevice', "App\Http\Controllers\AuthController@verifyDevice");
    // Route::post('updateWithdrawal', "App\Http\Controllers\WithdrawalsController@setWithdrawalById");
    // // Route::get("statisticsGetClients", "App\Http\Controllers\StatisticsController@getClients");
    // // Route::get("statisticsgetStatistics", "App\Http\Controllers\StatisticsController@getStatistics");
    // // Route::get("statisticsGetRegisteredUsers", "App\Http\Controllers\StatisticsController@getRegisteredUsers");
    // Route::get("clientsRegisteredUsers", "App\Http\Controllers\ClientsController@getRegisteredUsers");
    // Route::get("clientsGetAllClients", "App\Http\Controllers\ClientsController@getAllClients");
    // Route::get("clientsGetClients", "App\Http\Controllers\ClientsController@getClients");
    // // Route::get("refreshAccessToken", "App\Http\Controllers\AuthController@refreshToken");
});
