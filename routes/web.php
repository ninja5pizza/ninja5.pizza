<?php

use App\Http\Controllers\PizzaNinjasCollection;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/collection', PizzaNinjasCollection::class)->name('collection');
