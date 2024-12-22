<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CacheBitcoinBlockHeight implements ShouldQueue
{
    use Queueable;

    protected string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = Str::of(config('services.blockcypher.base_url'))
            ->append('btc/main')
            ->toString();
    }

    public function handle(): void
    {
        $response = Http::acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            Cache::put('bitcoin_block_height', $response->json());
        }
    }
}
