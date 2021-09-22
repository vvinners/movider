<?php

use Illuminate\Support\Facades\Route;
use VVinners\Movider\MoviderController;

Route::group([
    'prefix' => 'api',
    'middleware' => 'api',
], function() {
    Route::get('movider/totalUsage', [MoviderController::class, 'totalUsage']);
    Route::get('movider/receiver/{to}', [MoviderController::class, 'receiver']);
    Route::get('movider/filter/{dateRange}', [MoviderController::class, 'filter']);
    Route::get('movider/usage/{dateRange}', [MoviderController::class, 'usage']);
});
