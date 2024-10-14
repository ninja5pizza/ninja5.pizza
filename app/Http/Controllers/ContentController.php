<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    protected string $file_name;

    public function __invoke(string $inscription_id)
        {
            $this->file_name = Str::of($inscription_id)
                ->append('.svg')
                ->toString();

            if (! Storage::disk('ninja_components')->exists($this->file_name)) {
                abort(404);
            }

            return Storage::disk('ninja_components')
                ->get($this->file_name);
    }
}
