<?php

namespace App\Console\Commands;

use App\Jobs\FetchNinjaModuleSvg;
use App\Models\Inscription;
use Illuminate\Console\Command;

class FetchNinjaModule extends Command
{
    protected $signature = 'ninja:module {inscription_id?} {--all}';

    protected $description = 'Fetch Ninja modules.';

    public function handle()
    {
        if ($this->option('all')) {
            $this->fetchAllNinjaModuleSvgs();

            return false;
        }

        if (is_null($this->argument('inscription_id'))) {
            $this->error('No inscription ID provided.');

            return false;
        }

        FetchNinjaModuleSvg::dispatch(
            $this->argument('inscription_id')
        );

        $this->info('Fethed Ninja module: '.$this->argument('inscription_id').'.');
    }

    public function fetchAllNinjaModuleSvgs(): void
    {
        foreach (Inscription::whereNotNull('meta')->get() as $inscription) {
            collect($inscription->meta)
                ->each(function ($item) {
                    FetchNinjaModuleSvg::dispatch($item['id']);
                });
        }
    }
}
