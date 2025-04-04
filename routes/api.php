<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DockerController;


Route::post('/docker', [DockerController::class, 'store']);

Route::get('/docker', [DockerController::class, 'index']);

Route::delete('/docker/{id}', [DockerController::class, 'destroy']);

Route::put('/docker/{id}', [DockerController::class, 'update']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/add-image', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


