<?php

use App\Http\Controllers\Website\Homepage\HomepageController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Homepage Routes >=========
===============================================*/
Route::controller(HomepageController::class)->prefix('/')->name('homepage.')->group(function () {
    Route::get('/', 'index')->name('index');
});
