<?php

namespace App\Jobs;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FetchNinjaModuleSvg implements ShouldQueue
{
    use Dispatchable, Queueable;

    public string $url;

    public string $ninja_module_svg_file;

    public function __construct(
        public string $inscription_id
    ) {
        $this->url = 'https://ordiscan.com/content/'.$this->inscription_id;

        $this->ninja_module_svg_file = base_path('resources/svg/ninja_modules/'.$this->inscription_id.'.svg');
    }

    public function handle(): void
    {
        if (File::exists($this->ninja_module_svg_file)) {
            return;
        }

        $response = Http::get($this->url);

        if (! $response->successful()) {
            throw new Exception("HTTP Request failed with status: ".$response->status());
        }

        if ($response->header('Content-Type') !== 'image/svg+xml') {
            throw new Exception("Inscription is not a SVG file: ".$this->inscription_id);
        }

        if ($response->successful()) {
            File::put(
                $this->ninja_module_svg_file,
                $response->body()
            );
        }
    }
}
