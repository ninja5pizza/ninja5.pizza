<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait HasMcaChefArt
{
    private $cdn_base_url = 'https://cdn.pizza.ninja/';

    private $mcaChefDirectory = 'images/mca_chef/';

    private function getMcaChefCacheKey(): string
    {
        return 'mca_chef_art_'.$this->id;
    }

    private function getMcaChefDirectory(): string
    {
        return $this->mcaChefDirectory.'PN_'.$this->getInternalCollectionId().'/';
    }

    public function hasMcaChefImages(): bool
    {
        return $this->getMcaChefFileNames()->isNotEmpty();
    }

    public function getMcaChefFullUrls(): Collection
    {
        return $this->getMcaChefFileNames()->map(
            fn ($path) => $this->cdn_base_url.urlencode($path)
        );
    }

    public function getMcaChefFileNames(): Collection
    {
        if (Cache::has($this->getMcaChefCacheKey())) {
            return Cache::get($this->getMcaChefCacheKey());
        }

        try {
            $files = collect(Storage::disk('cloudflare')->files($this->getMcaChefDirectory()))
                ->filter(function ($file) {
                    return strtolower(
                        Storage::disk('cloudflare')->mimeType($file)
                    ) === 'image/gif';
                })
                ->values();

            Cache::put($this->getMcaChefCacheKey(), $files, now()->addDay());
        } catch (Exception $e) {
            $files = collect([]);
            Log::error('Error checking McaChef art for model: '.$this->id.': '.$e->getMessage());
        }

        return $files;
    }
}
