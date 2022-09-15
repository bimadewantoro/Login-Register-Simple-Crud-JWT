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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::post('/register', 'App\Http\Controllers\AuthController@register');
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('/refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('/me', 'App\Http\Controllers\AuthController@me');
});

Route::apiResource('proposals', App\Http\Controllers\ProposalController::class);


// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {
//     Route::post('/registrasi_tenant', 'App\Http\Controllers\RegistrasiTenantController@registrasi_tenant');
//     Route::post('/login_tenant', 'App\Http\Controllers\RegistrasiTenantController@login_tenant');
//     Route::post('/logout_tenant', 'App\Http\Controllers\RegistrasiTenantController@logout_tenant');
//     Route::post('/refresh_tenant', 'App\Http\Controllers\RegistrasiTenantController@refresh_tenant');
//     Route::post('/me_tenant', 'App\Http\Controllers\RegistrasiTenantController@me_tenant');
// });