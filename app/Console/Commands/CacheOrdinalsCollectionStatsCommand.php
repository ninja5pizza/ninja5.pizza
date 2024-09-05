<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CacheOrdinalsCollectionStats;

class CacheOrdinalsCollectionStatsCommand extends Command
{
    protected $signature = 'ord-collection:cache-stats';

    protected $description = 'Cache the stats for the Pizza Ninjas collection';

    public function handle()
    {
        CacheOrdinalsCollectionStats::dispatchSync('pizza-ninjas');

        $this->info('Stats for Pizza Ninjas collection saved to cache.');
    }
}
