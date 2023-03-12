<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backoffice\Health\HealthController;
use App\Http\Controllers\Backoffice\Banner\BannerController;

/*
|--------------------------------------------------------------------------
| Backoffice Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Backoffice routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "backoffice" middleware group. Make something great!
|
*/

Route::group([
    'namespace' => 'Backoffice',
    'as' => 'backoffice.',
], function () {
    Route::get('health', [HealthController::class, 'index'])->name('backoffice.health');

    // Route::resource('banners', BannerController::class)->only(['index']);
    Route::get('banners', [BannerController::class, 'index'])->name('backoffice.index');
});