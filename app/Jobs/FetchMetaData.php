<?php

namespace App\Jobs;

use App\Models\Inscription;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FetchMetaData implements ShouldQueue
{
    use Queueable;

    public $tries = 2;

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
            // ->withOptions(['decode_content' => false])
            ->get($this->url);

        if (! $response->successful()) {
            throw new Exception('HTTP Request failed with status: '.$response->status());
        }

        if ($response->successful()) {
            $body = $this->getBodyFromResponse($response);

            $this->inscription->meta = json_decode($this->extractJsonFromHtml($body), true);

            if (! $this->inscription->isDirty('meta')) {
                throw new Exception('Unable to retrieve meta data for '.$this->inscription->name);
            }

            $this->inscription->save();
        }
    }

    protected function getBodyFromResponse(Response $response): string
    {
        $body = $response->body();

        if ($response->header('Content-Encoding') === 'br') {
            try {
                $body = brotli_uncompress($response->body());
            } catch (Exception $e) {
                throw new Exception('Brotli decoding failed: '.$e->getMessage());
            }
        }

        return $body;
    }

    protected function extractJsonFromHtml(string $html): ?string
    {
        // First, try to extract from const metadata = [...]
        $metadataPattern = '/const\s+metadata\s*=\s*(\[[\s\S]*?\]);/';

        $metadataMatch = Str::of($html)
            ->match($metadataPattern)
            ->trim(' \t\n\r\0\x0B,;');

        if ($metadataMatch->isNotEmpty()) {
            $json = $this->convertJavaScriptToJson($metadataMatch->toString());

            if (json_decode($json) !== null) {
                return $json;
            }
        }

        // Try existing pattern: Ninja.load(...)
        $pattern = '/Ninja\.load\((.*?)\)/s';

        $match = Str::of($html)
            ->match($pattern)
            ->trim(' \t\n\r\0\x0B,');

        if ($match->isJson()) {
            return $match->toString();
        }

        return null;
    }

    protected function convertJavaScriptToJson(string $javascript): string
    {
        return Str::of($javascript)
            // Replace single quotes with double quotes
            ->replace("'", '"')
            // Add quotes around unquoted keys (word followed by colon)
            ->replaceMatches('/(\w+):\s/', '"$1": ')
            // Remove trailing commas before closing brackets/braces
            ->replaceMatches('/,(\s*[}\]])/', '$1')
            ->toString();
    }
}
