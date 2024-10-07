<?php

namespace App\Console\Commands;

use App\Jobs\FetchNinjaSvgComponent;
use App\Models\Inscription;
use Illuminate\Console\Command;

class FetchNinjaSvgComponentCommand extends Command
{
    protected $signature = 'ninja:component {inscription_id?} {--all}';

    protected $description = 'Fetch Ninja SVG components.';

    public function handle()
    {
        if ($this->option('all')) {
            $this->fetchAllNinjaSvgComponents();

            $this->info('All Ninja SVG components are queued for fetching.');

            return false;
        }

        if (is_null($this->argument('inscription_id'))) {
            $this->error('No inscription ID provided.');

            return false;
        }

        FetchNinjaSvgComponent::dispatch(
            $this->argument('inscription_id')
        );

        $this->info('Fethed Ninja SVG component: '.$this->argument('inscription_id').'.');
    }

    public function fetchAllNinjaSvgComponents(): void
    {
        foreach (Inscription::whereNotNull('meta')->get() as $inscription) {
            collect($inscription->meta)
                ->each(function ($item) {
                    FetchNinjaSvgComponent::dispatch($item['id']);
                });
        }
    }
}
