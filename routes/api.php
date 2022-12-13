<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProposalController;

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


Route::group(['prefix' => 'user'], function () {
    Route::post('register', [UserController::class, 'store']);
    Route::post('login', [UserController::class, 'login']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'] , function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'proposal'] , function () {
    Route::get('/', [ProposalController::class, 'index']);
    Route::get('/{id}', [ProposalController::class, 'show']);
    Route::post('/create', [ProposalController::class, 'store']);
    Route::put('/{id}', [ProposalController::class, 'update']);
    Route::delete('/{id}', [ProposalController::class, 'destroy']);
});