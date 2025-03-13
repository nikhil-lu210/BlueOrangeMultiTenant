<?php

use Illuminate\Support\Facades\Route;

/* ==============================================
============< Public Routes >============
===============================================*/
Route::prefix('/')->name('website.')->group(function () {
    // homepage
    include_once 'homepage/homepage.php';
});
