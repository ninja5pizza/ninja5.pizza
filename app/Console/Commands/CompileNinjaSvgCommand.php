<?php

namespace App\Console\Commands;

use App\Jobs\CompileNinjaSvg;
use App\Models\Inscription;
use Illuminate\Console\Command;

class CompileNinjaSvgCommand extends Command
{
    protected $signature = 'ninja:svg {id? : The inscription ID or Ninja number} {--a|all : Compile all Ninjas into a single SVG file} {--force : Force files to be overwritten}';

    protected $description = 'Compile a Ninja into a single SVG file.';

    public function handle()
    {
        if ($this->option('all')) {
            $this->compileAllNinjas();

            $this->info('All Pizza Ninjas are queued for compiling into a single SVG file.');

            return Command::SUCCESS;
        }

        $id = $this->argument('id');

        if (is_null($id)) {
            $this->error('No Ninja ID or Inscription ID provided.');

            return Command::INVALID;
        }

        $inscription = Inscription::where('name', 'LIKE', "%#{$id}")
            ->orWhere('inscription_id', $id)
            ->orderBy('name')
            ->first();

        if (is_null($inscription)) {
            $this->error('No Ninja found for the provided ID.');

            return Command::INVALID;
        }

        if ($this->option('force') === false && $inscription->fullSvgExists()) {
            $this->error('SVG already exists for '.$inscription->name.'. Use --force to overwrite it.');

            return Command::FAILURE;
        }

        CompileNinjaSvg::dispatchSync($inscription, $this->option('force'));

        $this->info($inscription->name.' compiled into a SVG file successfully!');

        return Command::SUCCESS;
    }

    protected function compileAllNinjas(): void
    {
        foreach (Inscription::whereNotNull('inscription_id')->whereNotNull('meta')->get() as $inscription) {
            CompileNinjaSvg::dispatch($inscription, $this->option('force'));
        }
    }
}
