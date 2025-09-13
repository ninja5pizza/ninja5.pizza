<?php

namespace App\Jobs;

use App\Models\Price;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class StoreBitcoinPrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    private array $currencies = [
        'usd',
    ];

    public function handle(): void
    {
        foreach ($this->currencies as $currency) {
            $price = Cache::get('bitcoin_price');

            if ($price === null) {
                continue;
            }

            Price::updateOrCreate([
                'currency' => Str::upper($currency),
                'created_at' => $this->getTimestamp(),
            ], [
                'price' => $price,
            ]);
        }
    }

    private function getTimestamp(): string
    {
        return Carbon::now()
            ->startOfHour()
            ->addMinutes(
                15 * floor(Carbon::now()->minute / 15)
            );
    }
}
