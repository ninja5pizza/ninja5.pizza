<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CacheBitcoinPrice implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=BTC';
    }

    public function handle(): void
    {
        $response = Http::withHeaders([
            'X-CMC_PRO_API_KEY' => config('services.coinmarketcap.api_key'),
        ])
            ->acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            Cache::put('bitcoin_price', $response->json('data.BTC.quote.USD.price'));
        }
    }
}
