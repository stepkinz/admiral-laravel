<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PhoneCheckController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/employees', [EmployeeController::class, 'search'])
    ->middleware('throttle:60,1');

Route::get('/phones/check', [PhoneCheckController::class, 'check'])
    ->middleware('throttle:60,1');
