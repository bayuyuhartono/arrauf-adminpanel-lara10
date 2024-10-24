<?php

use Illuminate\Support\Facades\Route;
use Modules\Cms\app\Http\Controllers\CmsWallpaperController;
use Modules\Cms\app\Http\Controllers\CmsTestimoniController;
use Modules\Cms\app\Http\Controllers\CmsMottoController;
use Modules\Cms\app\Http\Controllers\CmsQuoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth','has-permission'])->group(function () {
    Route::prefix('cms')->group(function () {
        // wallpaper
        Route::get('wallpaper', [CmsWallpaperController::class, 'form']);
        Route::post('wallpaper', [CmsWallpaperController::class, 'updateAction']);

        // quote
        Route::get('quote', [CmsQuoteController::class, 'form']);
        Route::post('quote', [CmsQuoteController::class, 'updateAction']);

        // testimoni 
        Route::get('testimoni', [CmsTestimoniController::class, 'index']);
        Route::get('testimoni/add', [CmsTestimoniController::class, 'add']);
        Route::post('testimoni/add', [CmsTestimoniController::class, 'store']);
        Route::get('testimoni/edit/{id}', [CmsTestimoniController::class, 'edit']);
        Route::post('testimoni/edit/{id}', [CmsTestimoniController::class, 'update']);
        Route::get('testimoni/delete/{id}', [CmsTestimoniController::class, 'delete']);

        // motto 
        Route::get('motto', [CmsMottoController::class, 'index']);
        Route::get('motto/add', [CmsMottoController::class, 'add']);
        Route::post('motto/add', [CmsMottoController::class, 'store']);
        Route::get('motto/edit/{id}', [CmsMottoController::class, 'edit']);
        Route::post('motto/edit/{id}', [CmsMottoController::class, 'update']);
        Route::get('motto/delete/{id}', [CmsMottoController::class, 'delete']);
    });
});