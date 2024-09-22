<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Inscription;


class ProfileController extends Controller
{
    public function __invoke(string $handle): View
    {
        $ninja = collect(config('ninja5'))->get($handle);
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
