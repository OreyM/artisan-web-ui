<?php

use App\Http\Controllers\Web\DatabasePageController;
use App\Http\Controllers\Web\MainPageController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'page.',
], function () {
    Route::get('/', MainPageController::class)->name('main');
    Route::get('database', DatabasePageController::class)->name('database');
});
