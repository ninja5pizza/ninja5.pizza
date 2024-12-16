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
    ];

    public function __invoke(Inscription $inscription, string $format)
    {
        $this->boot($inscription, $format);
        $this->validateFormat($format);

        if ($format === 'svg') {
            return $this->downloadSVG($inscription);
        }

        return $this->downloadImage($inscription, $format);
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
        return Str::of($inscription->name)
            ->slug()
            ->append('.'.$format)
            ->toString();
    }

    private function downloadImage(Inscription $inscription, string $format)
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

    private function downloadSVG(Inscription $inscription)
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
