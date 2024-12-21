<?php

namespace App\Console\Commands;

use App\Jobs\CacheOrdinalsCollectionStats;
use Illuminate\Console\Command;

class CachePetsStatsCommand extends Command
{
    protected $signature = 'pets:cache-stats';

    protected $description = 'Cache the stats for the Pizza Pets collection';

    public function handle()
    {
        CacheOrdinalsCollectionStats::dispatchSync('pizza-pets');

        $this->info('Stats for Pizza Pets collection saved to cache.');
    }
}
