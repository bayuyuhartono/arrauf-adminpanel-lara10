<?php

use Illuminate\Support\Facades\Route;
use Modules\Cms\app\Http\Controllers\CmsWallpaperController;
use Modules\Cms\app\Http\Controllers\CmsTestimoniController;

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
        Route::get('wallpaper', [CmsWallpaperController::class, 'form']);
        Route::post('wallpaper', [CmsWallpaperController::class, 'updateAction']);

        Route::get('testimoni', [CmsTestimoniController::class, 'index']);
        Route::get('testimoni/add', [CmsTestimoniController::class, 'add']);
        Route::post('testimoni/add', [CmsTestimoniController::class, 'store']);
        Route::get('testimoni/edit/{id}', [CmsTestimoniController::class, 'edit']);
        Route::post('testimoni/edit/{id}', [CmsTestimoniController::class, 'update']);
        Route::get('testimoni/delete/{id}', [CmsTestimoniController::class, 'delete']);
    });
});