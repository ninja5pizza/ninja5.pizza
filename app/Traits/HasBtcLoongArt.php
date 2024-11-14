<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait HasBtcLoongArt
{
    private $cdn_base_url = 'https://cdn.pizza.ninja/';

    private $btcLoongDirectory = 'images/btc_loong/';

    private function getBtcLoongCacheKey(): string
    {
        return 'btc_loong_art_'.$this->id;
    }

    private function getBtcLoongDirectory(): string
    {
        return $this->btcLoongDirectory.'PN_'.$this->getInternalCollectionId().'/';
    }

    public function hasBtcLoongImages(): bool
    {
        return $this->getBtcLoongFileNames()->isNotEmpty();
    }

    public function getBtcLoongFullUrls(): Collection
    {
        return $this->getBtcLoongFileNames()->map(
            fn ($path) => $this->cdn_base_url.urlencode($path)
        );
    }

    public function getBtcLoongFileNames(): Collection
    {
        if (Cache::has($this->getBtcLoongCacheKey())) {
            return Cache::get($this->getBtcLoongCacheKey());
        }

        try {
            $files = collect(Storage::disk('cloudflare')->files($this->getBtcLoongDirectory()))
                ->filter(function ($file) {
                    return strtolower(
                        Storage::disk('cloudflare')->mimeType($file)
                    ) === 'image/jpeg';
                })
                ->values();

            Cache::put($this->getBtcLoongCacheKey(), $files, now()->addDay());
        } catch (Exception $e) {
            $files = collect([]);
            Log::error('Error checking BtcLoong art for model: '.$this->id.': '.$e->getMessage());
        }

        return $files;
    }
}
