<?php

namespace Tests\Unit\Jobs;

use App\Jobs\CacheBitcoinBlockHeight;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

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
