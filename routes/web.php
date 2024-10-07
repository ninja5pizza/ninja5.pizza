<?php

use App\Http\Controllers\DownloadSvgController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomepageController::class)->name('home');

Route::get('/{handle}', ProfileController::class)->name('profile');

Route::get(
    '/inscription/{inscription:inscription_id}',
    InscriptionController::class
)->name('inscription');

Route::get(
    '/download/{inscription:inscription_id}',
    DownloadSvgController::class
)->name('download-svg');

Route::post('/search', SearchController::class)->name('search');
