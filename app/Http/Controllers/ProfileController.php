<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Inscription;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ProfileController extends Controller
{
    public function __invoke(string $handle): View
    {
        $ninja = Collection::make(config('ninja5'))
            ->collapse()
            ->mapWithKeys(fn($value, $key) => [strtolower($key) => $value])
            ->get(Str::lower($handle));

        $inscription_id = collect($ninja)->get('inscription_id');

        $inscription = Inscription::where(
            'inscription_id',
            $inscription_id
        )->firstOrFail();

        return view('inscription', [
            'inscription' => $inscription,
        ]);
    }
}
