<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\SubActivityController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\Controller;

Route::apiResource('activities', ActivityController::class);
Route::apiResource('class-rooms', ClassRoomController::class);
Route::apiResource('sub-activities', SubActivityController::class);
Route::apiResource('units', UnitController::class);
