<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    protected string $file_name;

    public function __invoke(string $inscription_id): Response
    {
        $this->file_name = Str::of($inscription_id)
            ->append('.svg')
            ->toString();

        if (! Storage::disk('ninja_components')->exists($this->file_name)) {
            abort(404);
        }

        $content = Storage::disk('ninja_components')
            ->get($this->file_name);

        return response($content, 200, [
            'Content-Type' => 'image/svg+xml',
        ]);
    }
}
