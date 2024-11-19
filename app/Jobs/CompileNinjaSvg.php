<?php

namespace App\Jobs;

use App\Models\Inscription;
use App\View\Components\NinjaSvgComponent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompileNinjaSvg implements ShouldQueue
{
    use Queueable;

    public string $file_name;

    public string $content = '';

    public function __construct(
        public Inscription $inscription,
        public bool $overwrite = false,
    ) {
        $this->file_name = $this->inscription->getInternalCollectionId().'.svg';
    }

    public function handle(): void
    {
        if ($this->inscription->fullSvgExists() && $this->overwrite === false) {
            return;
        }

        $this->compile();
        $this->cleanupOrphanPlaceholders();

        if (Str::of($this->content)->isEmpty()) {
            return;
        }

        Storage::disk('ninjas')->put(
            $this->file_name,
            $this->content,
        );
    }

    protected function compile(): void
    {
        $this->inscription->getSvgComponentsInscriptionIds()->each(function (string $inscription_id) {
            $innerSvg = (new NinjaSvgComponent(
                $inscription_id,
                $this->inscription->getConfigForInscriptionId($inscription_id))
            )
                ->innerSvgContent();

            $this->content = Str::of($this->content)
                ->append($innerSvg)
                ->toString();
        });

        $svg = new NinjaSvgComponent(0, []);

        $this->content = Str::of($this->content)
            ->prepend($svg->backgroundRectangle())
            ->prepend($svg->openTag())
            ->append($svg->closeTag())
            ->toString();
    }

    protected function cleanupOrphanPlaceholders(): void
    {
        $this->content = Str::of($this->content)
            ->replaceMatches('/(\s*)fill="%%ST\d+%%"/', '')
            ->toString();
    }
}
