<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('cron')->group(function () {
    Route::get('/action', function (Request $request) {
        return response()->json(['message' => 'Hello from API v2']);
    });
});
