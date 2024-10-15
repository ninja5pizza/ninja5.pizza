<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadSvgController extends Controller
{
    protected $file_name;

    protected $download_file_name;

    public function __invoke(Inscription $inscription)
    {
        $this->file_name = Str::of($inscription->getInternalCollectionId())
            ->append('.svg')
            ->toString();

        $this->download_file_name = Str::of($inscription->name)
            ->slug()
            ->append('.svg')
            ->toString();

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
