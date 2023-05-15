<?php

use App\Http\Controllers\Api\V1\ClearCacheController;
use App\Http\Controllers\Api\V1\DatabaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1',
    'as'     => 'api.v1.',
], function () {
    Route::group([
        'prefix' => 'artisan',
        'as'     => 'artisan.',
    ], function () {
        Route::get('clear-cache', ClearCacheController::class)->name('clear-cache');

        Route::group([
            'prefix' => 'table',
            'as'     => 'table.',
        ], function () {
            Route::post('create', [DatabaseController::class, 'createTable'])->name('create');
        });
    });
});
