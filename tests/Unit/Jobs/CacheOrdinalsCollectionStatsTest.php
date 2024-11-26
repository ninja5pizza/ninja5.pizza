<?php

namespace Tests\Unit\Jobs;

use App\Jobs\CacheOrdinalsCollectionStats;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CacheOrdinalsCollectionStatsTest extends TestCase
{
    use RefreshDatabase;

    protected function validResponse(): array
    {
        return [
            'totalVolume' => '25893300867',
            'owners' => '1193',
            'supply' => '1500',
            'floorPrice' => '14057000',
            'totalListed' => '92',
            'pendingTransactions' => '0',
            'inscriptionNumberMin' => '56122947',
            'inscriptionNumberMax' => '56275803',
            'symbol' => 'pizza-ninjas',
        ];
    }

    #[Test]
    public function it_caches_the_ordinals_collection_stats(): void
    {
        Http::fake([
            'api-mainnet.magiceden.dev/*' => Http::response($this->validResponse(), 200),
        ]);

        CacheOrdinalsCollectionStats::dispatch('pizza-ninjas');

        $this->assertTrue(Cache::has('ordinals_collection_stats_pizza-ninjas'));
        $this->assertEquals($this->validResponse(), Cache::get('ordinals_collection_stats_pizza-ninjas'));
    }
}
