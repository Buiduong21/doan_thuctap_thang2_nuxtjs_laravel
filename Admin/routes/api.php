<?php

use App\Http\Controllers\Api\AuthControler;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\Api\ApiOrderControler;
use App\Http\Controllers\Api\ApiProfileController;

use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->group(function () {
//     Route::Get('auth/me', [AuthControler::class, 'getMe']);
// });

Route::apiResource('apicategory', CategoryController::class);
Route::post('register', [AuthControler::class, 'register']);
Route::post('login', [AuthControler::class, 'login']);
Route::get('user', [AuthControler::class, 'userInfo'])->middleware('auth:api');
Route::apiResource('apiproduct', ApiProductController::class);
Route::apiResource('apipost', ApiPostController::class);
Route::apiResource('apiorder', ApiOrderControler::class);
Route::apiResource('apiprofile', ApiProfileController::class);

