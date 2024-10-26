<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\app\Http\Controllers\BlogNewsController;
use Modules\Blog\app\Http\Controllers\BlogPagesController;

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
    Route::prefix('blog')->group(function () {
        // news
        Route::get('news', [BlogNewsController::class, 'index']);
        Route::get('news/add', [BlogNewsController::class, 'add']);
        Route::post('news/add', [BlogNewsController::class, 'store']);
        Route::get('news/edit/{uuid}', [BlogNewsController::class, 'edit']);
        Route::post('news/edit/{uuid}', [BlogNewsController::class, 'update']);
        Route::get('news/delete/{uuid}', [BlogNewsController::class, 'delete']);

        // pages
        Route::get('pages', [BlogPagesController::class, 'index']);
        Route::get('pages/add', [BlogPagesController::class, 'add']);
        Route::post('pages/add', [BlogPagesController::class, 'store']);
        Route::get('pages/edit/{uuid}', [BlogPagesController::class, 'edit']);
        Route::post('pages/edit/{uuid}', [BlogPagesController::class, 'update']);
        Route::get('pages/delete/{uuid}', [BlogPagesController::class, 'delete']);
    });
});