<?php

namespace App\Jobs;

use App\Models\Inscription;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FetchMetaData implements ShouldQueue
{
    use Queueable;

    public string $url;

    public function __construct(
        public Inscription $inscription,
    ) {
        $this->url = Str::of(config('services.ordinals.base_url'))
            ->append('/content/')
            ->append($this->inscription->inscription_id)
            ->toString();
    }

    public function handle(): void
    {
        $response = Http::withHeaders([
            'Accept-Encoding' => 'gzip, deflate, br, zstd',
        ])
            ->withOptions(['decode_content' => false])
            ->get($this->url);

        if (! $response->successful()) {
            throw new Exception('HTTP Request failed with status: '.$response->status());
        }

        if ($response->successful()) {
            $json = $this->extractJsonFromHtml($response->body());

            $this->inscription->meta = json_decode($json, true);

            $this->inscription->save();
        }
    }

    public function extractJsonFromHtml(string $html): ?string
    {
        $pattern = '/Ninja\.load\((.*?)\)/s';

        preg_match($pattern, $html, $matches);

        if (! empty($matches[1])) {
            $jsonString = trim($matches[1], " \t\n\r\0\x0B,");

            return $jsonString;
        }

        return null;
    }
}
