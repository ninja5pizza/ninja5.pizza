<?php

use App\Http\Controllers\Api\BlockHeightController;
use App\Http\Controllers\Api\ChartController;
use App\Http\Controllers\Api\StatsController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\PizzaNinjaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Models\PizzaNinja;
use Illuminate\Support\Facades\Route;

Route::get('/', HomepageController::class)
    ->name('home');

// Route::get('/collection', CollectionController::class)
//     ->name('collection');

Route::get('/collection', function () {
    return redirect('https://pizza.ninja/collection', 301);
})->name('collection');

Route::get('/collection/{tribe}', [CollectionController::class, 'tribe'])
    ->whereIn('tribe', (new PizzaNinja)->tribes()->keys()->all())
    ->name('collection.tribe');

Route::get('/{id}', function (int $id) {
    if ($id > 0 && $id <= 1500) {
        return redirect('/pizza-ninjas/'.$id, 301);
    }

    abort(404);
})->whereNumber('id');

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
    '/download/{inscription:inscription_id}/{format}',
    DownloadController::class
)
    ->name('download-pfp');

Route::post('/search', SearchController::class)->name('search');

Route::get('/api/blockheight', BlockHeightController::class)
    ->middleware('throttle:60,1');

Route::get('/api/chart/pizza-pets', [ChartController::class, 'pizza_pets'])
    ->middleware('throttle:60,1');

Route::get('/api/chart/pizza-ninjas', [ChartController::class, 'pizza_ninjas'])
    ->middleware('throttle:60,1');

Route::get('/api/stats/pizza-pets', [StatsController::class, 'pizza_pets'])
    ->middleware('throttle:60,1');
