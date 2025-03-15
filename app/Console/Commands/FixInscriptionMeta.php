<?php

namespace App\Console\Commands;

use App\Models\Inscription;
use Illuminate\Console\Command;

class FixInscriptionMeta extends Command
{
    protected $signature = 'ninja:fix-meta';

    protected $description = 'Fix meta data.';

    protected string $trait_to_find = "cat-top-of-head____ball-of-yarn.svg";

    public function handle()
    {
        // TBD

        $this->info('Meta data fixed successfully!');
        return Command::SUCCESS;
    }
}
