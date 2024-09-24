<?php

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

Route::post('/search', SearchController::class)->name('search');
