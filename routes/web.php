<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PizzaNinjasCollection;

Route::get('/', HomepageController::class)->name('home');
Route::get('/collection', PizzaNinjasCollection::class)->name('collection');
