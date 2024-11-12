<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\SubActivityController;
use App\Http\Controllers\UnitController;

Route::get('/', function () {
  return response()->json(['message' => 'API Pedro Rodrigues'])->name('home');
});

Route::get('/test', function () {
  return response()->json(['message' => 'API route is working']);
});

Route::apiResource('activities', ActivityController::class);
Route::apiResource('class-rooms', ClassRoomController::class);
Route::apiResource('sub-activities', SubActivityController::class);
Route::apiResource('units', UnitController::class);
