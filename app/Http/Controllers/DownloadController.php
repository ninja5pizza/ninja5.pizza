<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    protected $file_name;

    protected $cloudflare_path;

    protected $download_file_name;

    protected $allowed_formats = [
        'png',
        'jpg',
        'svg',
        'webp',
        'wallpaper_2160_3840'
    ];

    public function __invoke(Inscription $inscription, string $format)
    {
        $this->boot($inscription, $format);

        $this->validateFormat($format);

        if ($format === 'svg') {
            return $this->downloadSVG();
        }

        return $this->downloadImage();
    }

    private function validateFormat(string $format): void
    {
        if (! in_array($format, $this->allowed_formats, true)) {
            abort(404);
        }
    }

    private function boot(Inscription $inscription, string $format): void
    {
        $this->file_name = $this->getFileName($inscription, $format);
        $this->cloudflare_path = $this->getCloudflarePath($inscription, $format);
        $this->download_file_name = $this->getDownloadFileName($inscription, $format);
    }

    private function getFileName(Inscription $inscription, string $format): string
    {
        return Str::of($inscription->getInternalCollectionId())
            ->append('.'.$format)
            ->toString();
    }

    private function getCloudflarePath(Inscription $inscription, string $format): string
    {
        if (Str::startsWith($format, 'wallpaper_')) {
            $dimensions = Str::after($format, 'wallpaper_');

            return Str::of('images/wallpapers/')
                ->append($dimensions)
                ->append('/')
                ->append($inscription->getInternalCollectionId())
                ->append('.png')
                ->toString();
        }

        return Str::of('images/pfp/')
            ->append($format)
            ->append('/')
            ->append($inscription->getInternalCollectionId())
            ->append('.')
            ->append($format)
            ->toString();
    }

    private function getDownloadFileName(Inscription $inscription, string $format): string
    {
        if (Str::startsWith($format, 'wallpaper_')) {
            return Str::of($inscription->name)
                ->slug()
                ->append('-phone-wallpaper')
                ->append('.png')
                ->toString();
        }

        return Str::of($inscription->name)
            ->slug()
            ->append('.'.$format)
            ->toString();
    }

    private function downloadImage()
    {
        if (! Storage::disk('cloudflare')->exists($this->cloudflare_path)) {
            abort(404);
        }

        $mimeType = Storage::disk('cloudflare')->mimeType($this->cloudflare_path);

        return Storage::disk('cloudflare')
            ->download(
                $this->cloudflare_path,
                $this->download_file_name,
                [
                    'Content-Type' => $mimeType,
                ]
            );
    }

    private function downloadSVG()
    {
        if (! Storage::disk('ninjas')->exists($this->file_name)) {
            abort(404);
        }

        return Storage::disk('ninjas')
            ->download(
                $this->file_name,
                $this->download_file_name,
                [
                    'Content-Type' => 'image/svg+xml',
                ]
            );
    }
}
