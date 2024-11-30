<?php

use App\Models\FloorPrice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Resources\FloorPricesCollection;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PizzaNinjaController;
use App\Http\Controllers\DownloadSvgController;
use App\Http\Controllers\InscriptionController;

Route::get('/', HomepageController::class)
    ->name('home');

Route::get('/collection', CollectionController::class)
    ->name('collection');

Route::get('/{handle}', ProfileController::class)
    ->name('profile');

Route::get('/pizza-ninjas/{id}', PizzaNinjaController::class)
    ->whereNumber('id');

Route::get(
    '/content/{inscription:inscription_id}',
    ContentController::class
)
    ->name('content');

Route::get(
    '/inscription/{inscription:inscription_id}',
    InscriptionController::class
)
    ->name('inscription');

Route::get(
    '/download/{inscription:inscription_id}',
    DownloadSvgController::class
)
    ->name('download-svg');

Route::post('/search', SearchController::class)->name('search');

Route::get('/api/chart', function () {
    return new FloorPricesCollection(
        FloorPrice::take(1000)->latest()->get()->reverse()
    );
});
