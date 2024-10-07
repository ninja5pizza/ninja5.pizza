<?php

namespace App\Console\Commands;

use App\Jobs\CacheOrdinalsCollectionStats;
use Illuminate\Console\Command;

class CacheNinjaStatsCommand extends Command
{
    protected $signature = 'ninja:cache-stats';

    protected $description = 'Cache the stats for the Pizza Ninjas collection';

    public function handle()
    {
        CacheOrdinalsCollectionStats::dispatchSync('pizza-ninjas');

        $this->info('Stats for Pizza Ninjas collection saved to cache.');
    }
}
