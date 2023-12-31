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

Route::get('/', function () {
    return \App\Helpers\Response::output(\App\Business\Enum\StatusCode::SUCCESS, "It's running.... :)");
});

//Route::get('/email/resend', [\App\Http\Controllers\Api\UserController::class, 'resend'])->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Api\UserController::class, 'verify'])->name('verification.verify');

Route::post('auth', [\App\Http\Controllers\Api\AuthController::class, 'auth']);

Route::group(['prefix' => 'user'], function(){
   Route::post('store', [\App\Http\Controllers\Api\UserController::class, 'store']);
});

Route::group(['prefix' => 'invoice', 'middleware' => 'auth:sanctum'], function(){
    Route::get('/', [\App\Http\Controllers\Api\InvoiceController::class, 'index']);
    Route::post('store', [\App\Http\Controllers\Api\InvoiceController::class, 'store']);
    Route::get('show/{id}', [\App\Http\Controllers\Api\InvoiceController::class, 'show']);
    Route::put('update/{id}', [\App\Http\Controllers\Api\InvoiceController::class, 'update']);
    Route::delete('destroy/{id}', [\App\Http\Controllers\Api\InvoiceController::class, 'destroy']);
});
