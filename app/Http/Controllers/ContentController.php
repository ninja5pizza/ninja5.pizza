<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function __invoke(string $inscription_id)
        {
            if (! Storage::disk('ninja_components')->exists($inscription_id.'.svg')) {
                abort(404);
            }

            return Storage::disk('ninja_components')
                ->get($inscription_id.'.svg') ?? '';
    }
}
