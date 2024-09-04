<?php

namespace App\Console\Commands;

use App\Jobs\CacheBitcoinPrice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CacheBitcoinPriceCommand extends Command
{
    protected $signature = 'bitcoin:cache-price';

    protected $description = 'Cache the Bitcoin price';

    public function handle()
    {
        CacheBitcoinPrice::dispatchSync();

        $this->info('The current Bitcoin price is '.Cache::get('bitcoin_price', default: 'unknown'));
    }
}
