<?php

namespace App\Console\Commands;

use App\Models\Inscription;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ValidateInscriptionMeta extends Command
{
    protected $signature = 'ninja:validate-meta';

    protected $description = 'Validate Ninja meta data for missing values.';

    protected int $failures = 0;

    protected array $required_keys = [
        'id',
        'type',
        'trait',
    ];

    public function handle()
    {
        Inscription::each(function ($inscription) {
            if (!is_array($inscription->meta) || count($inscription->meta) === 0) {
                $this->error('Inscription ID ' . $inscription->inscription_id . ' has an empty or non-array meta JSON.');
                $this->failures++;
                return;
            }

            foreach ($inscription->meta as $item) {
                foreach ($this->required_keys as $key) {
                    if (!isset($item[$key]) || empty($item[$key])) {
                        $this->warn('Inscription ID ' . $inscription->inscription_id . ' has missing or empty value for key: ' . $key);
                        $this->failures++;
                    }
                }
            }
        });

        if ($this->failures > 0) {
            $this->error('Validation resulted in ' . $this->failures . ' ' . Str::plural('failure', $this->failures) . '.');
            return Command::FAILURE;
        }

        $this->info('All meta data is valid.');
        return Command::SUCCESS;
    }
}
