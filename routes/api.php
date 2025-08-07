<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/post-data', [App\Http\Controllers\PostDataController::class, 'index']);
    Route::post('/post-data', [App\Http\Controllers\PostDataController::class, 'store']);
    Route::get('/post-data/{postData}', [App\Http\Controllers\PostDataController::class, 'show']);
    Route::put('/post-data/{postData}', [App\Http\Controllers\PostDataController::class, 'update']);
    Route::delete('/post-data/{postData}', [App\Http\Controllers\PostDataController::class, 'destroy']);
});
