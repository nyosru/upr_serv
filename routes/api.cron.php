<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('cron')->group(function () {

    Route::get('/action', [\App\Http\Controllers\Api\service\DockerPythonAdapterController::class,'action']);
    Route::post('/action', [\App\Http\Controllers\Api\service\DockerPythonAdapterController::class,'action']);

    Route::get('/action2', function (Request $request) {
        return response()->json(['message' => 'Hello from API v2']);
    });

});
