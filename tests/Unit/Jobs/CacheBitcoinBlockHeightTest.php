<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use App\Jobs\CacheBitcoinBlockHeight;
use Illuminate\Support\Facades\Cache;
use PHPUnit\Framework\Attributes\Test;

class CacheBitcoinBlockHeightTest extends TestCase
{
    #[Test]
    public function it_caches_the_bitcoin_block_height(): void
    {
        Http::fake([
            'api.blockcypher.com/*' => Http::response([
                'name' => 'BTC.main',
                'height' => 123456,
            ], 200),
        ]);

        CacheBitcoinBlockHeight::dispatch();

        $this->assertTrue(Cache::has('bitcoin_block_height'));
        $this->assertEquals(123456, Collection::make(
            Cache::get('bitcoin_block_height'))->get('height')
        );
    }
}
