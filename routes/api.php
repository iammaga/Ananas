<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegistorController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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



Route::apiResource('auth/register', RegistorController::class);

Route::post('auth/login', [LoginController::class, 'login']); 

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("user-messages", function() {
        return response(User::with('messages')->find(Auth::user()->id));
    });
    Route::get('messages', [MessageController::class, 'index']);
    Route::post('messages', [MessageController::class, 'store']);
    Route::get('messages/{id}', [MessageController::class, 'show']);
    Route::delete('messages/{id}', [MessageController::class, 'destroy']);
});