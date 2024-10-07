<?php

namespace App\Console\Commands;

use App\Jobs\FetchMetaData;
use App\Models\Inscription;
use Illuminate\Console\Command;

class FetchNinjaMetaDataCommand extends Command
{
    protected $signature = 'ninja:meta';

    protected $description = 'Retrieve meta data for all Ninjas.';

    public function handle()
    {
        foreach (Inscription::whereNull('meta')->get() as $inscription) {
            FetchMetaData::dispatch($inscription);

            $this->info('Fetching meta data for '.$inscription->name.'.');
        }
    }
}
