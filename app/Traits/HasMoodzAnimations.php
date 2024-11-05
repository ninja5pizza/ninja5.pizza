<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait HasMoodzAnimations
{
    private $cdn_base_url = 'https://cdn.pizza.ninja/';

    private $moodzDirectory = 'images/0xmoodz/';

    private function getMoodzCacheKey(): string
    {
        return 'moodz_animations_'.$this->id;
    }

    private function getMoodzDirectory(): string
    {
        return $this->moodzDirectory.'PN_'.$this->getInternalCollectionId().'/';
    }

    public function hasMoodzImages(): bool
    {
        return $this->getMoodzFileNames()->isNotEmpty();
    }

    public function getMoodzFullUrls(): Collection
    {
        return $this->getMoodzFileNames()->map(
            fn ($path) => $this->cdn_base_url.urlencode($path)
        );
    }

    public function getMoodzFileNames(): Collection
    {
        if (Cache::has($this->getMoodzCacheKey())) {
            return Cache::get($this->getMoodzCacheKey());
        }

        try {
            $files = collect(Storage::disk('cloudflare')->files($this->getMoodzDirectory()))
                ->filter(function ($file) {
                    return strtolower(
                        Storage::disk('cloudflare')->mimeType($file)
                    ) === 'image/gif';
                })
                ->values();

            Cache::put($this->getMoodzCacheKey(), $files, now()->addDay());
        } catch (Exception $e) {
            $files = collect([]);
            Log::error('Error checking Moodz animations for model: '.$this->id.': '.$e->getMessage());
        }

        return $files;
    }
}
