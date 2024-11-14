<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait HasJasmineArt
{
    private $cdn_base_url = 'https://cdn.pizza.ninja/';

    private $jasmineDirectory = 'images/itisjasminnee/';

    private function getJasmineCacheKey(): string
    {
        return 'jasmine_art_'.$this->id;
    }

    private function getJasmineDirectory(): string
    {
        return $this->jasmineDirectory.'PN_'.$this->getInternalCollectionId().'/';
    }

    public function hasJasmineImages(): bool
    {
        return $this->getJasmineFileNames()->isNotEmpty();
    }

    public function getJasmineFullUrls(): Collection
    {
        return $this->getJasmineFileNames()->map(
            fn ($path) => $this->cdn_base_url.urlencode($path)
        );
    }

    public function getJasmineFileNames(): Collection
    {
        if (Cache::has($this->getJasmineCacheKey())) {
            return Cache::get($this->getJasmineCacheKey());
        }

        try {
            $files = collect(Storage::disk('cloudflare')->files($this->getJasmineDirectory()))
                ->filter(function ($file) {
                    return strtolower(
                        Storage::disk('cloudflare')->mimeType($file)
                    ) === 'image/jpeg';
                })
                ->values();

            Cache::put($this->getMoodzCacheKey(), $files, now()->addDay());
        } catch (Exception $e) {
            $files = collect([]);
            Log::error('Error checking Jasmine art for model: '.$this->id.': '.$e->getMessage());
        }

        return $files;
    }
}
