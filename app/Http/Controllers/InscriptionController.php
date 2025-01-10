<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\View\View;

class InscriptionController extends Controller
{
    public function __invoke(Inscription $inscription): View
    {
        if (! $inscription->collection || $inscription->collection->slug !== 'pizza-ninjas') {
            abort(404);
        }

        return view('inscription', [
            'inscription' => $inscription,
        ]);
    }
}
