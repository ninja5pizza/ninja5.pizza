<?php

namespace App\Jobs;

use App\Models\Inscription;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class FetchMetaData implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, Queueable, SerializesModels;

    public string $url;

    public $uniqueFor = 1;

    public function __construct(
        public Inscription $inscription,
    ) {
        $this->url = 'https://ordiscan.com/content/'.$this->inscription->inscription_id;
    }

    public function handle(): void
    {
        $response = Http::get($this->url);

        if ($response->successful()) {
            $json = $this->extractJsonFromHtml($response->body());

            $this->inscription->meta = $json;

            $this->inscription->save();
        }
    }

    public function extractJsonFromHtml(string $html): ?string {
        $pattern = '/Ninja\.load\((.*?)\)/s';

        preg_match($pattern, $html, $matches);

        if (!empty($matches[1])) {
            $jsonString = trim($matches[1], " \t\n\r\0\x0B,");

            return $jsonString;
        }

        return null;
    }
}
