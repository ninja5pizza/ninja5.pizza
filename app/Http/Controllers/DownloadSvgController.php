<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadSvgController extends Controller
{
    public function __invoke(Inscription $inscription)
    {
        return Storage::disk('ninjas')->download(
            $inscription->getInternalCollectionId().'.svg',
            Str::of($inscription->name)->slug()->append('.svg')->toString(),
            ['Content-Type' => 'image/svg+xml']
        );
    }
}
