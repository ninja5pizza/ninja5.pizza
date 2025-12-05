<?php

namespace App\Console\Commands;

use App\Jobs\FetchNinjaSvgComponent;
use App\Models\Inscription;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class FetchNinjaSvgComponentCommand extends Command
{
    protected $signature = 'ninja:component {inscription_id? : The inscription ID} {--a|all : Fetch all Ninja SVG components}  {--holiday : Fetch holiday trait SVG components} {--sticker : Fetch sticker SVG components} {--force : Force files to be overwritten}';

    protected $description = 'Fetch Ninja SVG components.';

    public function handle()
    {
        if ($this->option('all')) {
            $this->fetchNinjaSvgComponents();
            $this->fetchHolidaySvgComponents();
            $this->fetchStickerSvgComponents();

            $this->info('All Ninja SVG components are queued for fetching.');

            return Command::SUCCESS;
        }

        if ($this->option('holiday')) {
            $this->fetchHolidaySvgComponents();

            $this->info('Holiday SVG components are queued for fetching.');

            return Command::SUCCESS;
        }

        if ($this->option('sticker')) {
            $this->fetchStickerSvgComponents();

            $this->info('Sticker SVG components are queued for fetching.');

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

    protected function fetchHolidaySvgComponents(): void
    {
        Collection::make(config('holiday-traits'))
            ->pluck('inscription_id')
            ->each(function ($inscription_id) {
                FetchNinjaSvgComponent::dispatch(
                    $inscription_id,
                    $this->option('force')
                );
            });
    }

    protected function fetchStickerSvgComponents(): void
    {
        Collection::make(config('stickers'))
            ->pluck('inscription_id')
            ->each(function ($inscription_id) {
                FetchNinjaSvgComponent::dispatch(
                    $inscription_id,
                    $this->option('force')
                );
            });
    }

    protected function fetchNinjaSvgComponents(): void
    {
        Inscription::whereNotNull('meta')
            ->get()
            ->pluck('meta')
            ->flatMap(function (array $item) {
                return collect($item)
                    ->reject(fn ($trait) => $trait['id'] === 'non-visual')
                    ->pluck('id');
            })
            ->unique()
            ->each(function ($inscription_id) {
                FetchNinjaSvgComponent::dispatch(
                    $inscription_id,
                    $this->option('force')
                );
            });
    }
}
