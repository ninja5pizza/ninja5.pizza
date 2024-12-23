<?php

namespace App\Jobs;

use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FetchNinjaSvgComponent implements ShouldQueue
{
    use Dispatchable, Queueable;

    public $tries = 2;

    public string $url;

    public string $file_name;

    public function __construct(
        public string $inscription_id,
        public bool $overwrite = false,
    ) {
        $this->url = Str::of(config('services.ordinals.base_url'))
            ->append('/content/')
            ->append($this->inscription_id)
            ->toString();

        $this->file_name = $this->inscription_id.'.svg';
    }

    public function handle(): void
    {
        if (Storage::disk('ninja_components')->exists($this->file_name) && $this->overwrite === false) {
            return;
        }

        $response = Http::withHeaders([
            'Accept-Encoding' => 'gzip, deflate, br, zstd',
        ])
            ->withOptions(['decode_content' => false])
            ->get($this->url);

        if (! $response->successful()) {
            throw new Exception('HTTP Request failed with status: '.$response->status());
        }

        if ($response->header('Content-Type') !== 'image/svg+xml') {
            throw new Exception('Inscription is not a SVG file: '.$this->inscription_id);
        }

        if ($response->successful()) {
            Storage::disk('ninja_components')->put(
                $this->file_name,
                $response->body()
            );
        }
    }
}
