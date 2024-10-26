<?php

use Illuminate\Support\Facades\Route;
use Modules\Cms\app\Http\Controllers\CmsWallpaperController;
use Modules\Cms\app\Http\Controllers\CmsTestimoniController;
use Modules\Cms\app\Http\Controllers\CmsMottoController;
use Modules\Cms\app\Http\Controllers\CmsQuoteController;
use Modules\Cms\app\Http\Controllers\CmsGalleryController;
use Modules\Cms\app\Http\Controllers\CmsContactController;
use Modules\Cms\app\Http\Controllers\CmsBenefitController;
use Modules\Cms\app\Http\Controllers\CmsPpdbController;

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

        // contact
        Route::get('contact', [CmsContactController::class, 'form']);
        Route::post('contact', [CmsContactController::class, 'updateAction']);

        // ppdb
        Route::get('ppdb', [CmsPpdbController::class, 'form']);
        Route::post('ppdb', [CmsPpdbController::class, 'updateAction']);

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

        // benefit 
        Route::get('benefit', [CmsBenefitController::class, 'index']);
        Route::get('benefit/add', [CmsBenefitController::class, 'add']);
        Route::post('benefit/add', [CmsBenefitController::class, 'store']);
        Route::get('benefit/edit/{id}', [CmsBenefitController::class, 'edit']);
        Route::post('benefit/edit/{id}', [CmsBenefitController::class, 'update']);
        Route::get('benefit/delete/{id}', [CmsBenefitController::class, 'delete']);
    });
});

Route::middleware(['auth','has-permission-segfour'])->group(function () {
    Route::prefix('cms')->group(function () {
        // gallery 
        Route::get('gallery/{type}', [CmsGalleryController::class, 'index']);
        Route::get('gallery/{type}/add', [CmsGalleryController::class, 'add']);
        Route::post('gallery/{type}/add', [CmsGalleryController::class, 'store']);
        Route::get('gallery/{type}/edit/{uuid}', [CmsGalleryController::class, 'edit']);
        Route::post('gallery/{type}/edit/{uuid}', [CmsGalleryController::class, 'update']);
        Route::get('gallery/{type}/delete/{uuid}', [CmsGalleryController::class, 'delete']);
    });
});