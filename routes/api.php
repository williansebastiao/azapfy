<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return \App\Helpers\Response::output(\App\Business\Enum\StatusCode::SUCCESS, "It's running.... :)");
});

//Route::get('/email/resend', [\App\Http\Controllers\Api\UserController::class, 'resend'])->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Api\UserController::class, 'verify'])->name('verification.verify');

Route::post('auth', [\App\Http\Controllers\Api\AuthController::class, 'auth']);

Route::group(['prefix' => 'user'], function(){
   Route::post('store', [\App\Http\Controllers\Api\UserController::class, 'store']);
});

Route::middleware('auth:sanctum', function(){
    
});
