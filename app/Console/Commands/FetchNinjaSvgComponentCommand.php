<?php

namespace App\Console\Commands;

use App\Jobs\FetchNinjaSvgComponent;
use App\Models\Inscription;
use Illuminate\Console\Command;

class FetchNinjaSvgComponentCommand extends Command
{
    protected $signature = 'ninja:component {inscription_id? : The inscription ID} {--a|all : Fetch all Ninja SVG components}  {--force : Force files to be overwritten}';

    protected $description = 'Fetch Ninja SVG components.';

    public function handle()
    {
        if ($this->option('all')) {
            $this->fetchAllNinjaSvgComponents();

            $this->info('All Ninja SVG components are queued for fetching.');

            return Command::SUCCESS;
        }

        if (is_null($this->argument('inscription_id'))) {
            $this->error('No inscription ID provided.');

            return Command::INVALID;
        }

        FetchNinjaSvgComponent::dispatch(
            $this->argument('inscription_id'),
            $this->option('force')
        );

        $this->info('Fethed Ninja SVG component: '.$this->argument('inscription_id').'.');
    }

    protected function fetchAllNinjaSvgComponents(): void
    {
        Inscription::whereNotNull('meta')
            ->get()
            ->pluck('meta')
            ->flatMap(function (array $item) {
                return collect($item)->pluck('id');
            })->unique()->each(function ($inscription_id) {
                FetchNinjaSvgComponent::dispatch(
                    $inscription_id,
                    $this->option('force')
                );
            });
    }
}
