<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\app\Http\Controllers\BlogNewsController;

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
        //  news
        Route::get('news', [BlogNewsController::class, 'index']);
        Route::get('news/add', [BlogNewsController::class, 'add']);
        Route::post('news/add', [BlogNewsController::class, 'store']);
        Route::get('news/edit/{id}', [BlogNewsController::class, 'edit']);
        Route::post('news/edit/{id}', [BlogNewsController::class, 'update']);
        Route::get('news/delete/{id}', [BlogNewsController::class, 'delete']);
    });
});