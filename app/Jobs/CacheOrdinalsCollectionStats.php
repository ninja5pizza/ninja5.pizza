<?php

namespace App\Jobs;

use App\Models\FloorPrice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CacheOrdinalsCollectionStats implements ShouldQueue
{
    use Queueable;

    protected string $apiUrl;

    public function __construct(
        public string $symbol,
    ) {
        $this->apiUrl = Str::of(config('services.magiceden.base_url'))
            ->append('ord/btc/stat?collectionSymbol=')
            ->append($this->symbol)
            ->toString();
    }

    public function handle(): void
    {
        $response = Http::withToken(
            config('services.magiceden.api_key')
        )
            ->acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            Cache::put('ordinals_collection_stats_'.$this->symbol, $response->json());

            $model = new FloorPrice;
            $model->symbol = $response->json('symbol');
            $model->owners = $response->json('owners');
            $model->supply = $response->json('supply');
            $model->listed = $response->json('totalListed');
            $model->price_in_sats = $response->json('floorPrice');
            $model->save();
        }
    }
}
