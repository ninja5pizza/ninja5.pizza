<?php

namespace App\Providers;

use App\Ninja5;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::share('ninja5', new Ninja5(
            config('ninja5')
        ));

        JsonResource::withoutWrapping();
    }
}
