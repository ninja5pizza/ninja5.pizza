<?php

namespace App\Http\Controllers;

use App\Models\PizzaNinja;
use Illuminate\View\View;

class InscriptionController extends Controller
{
    public function __invoke(PizzaNinja $inscription): View
    {
        if (! $inscription->collection || $inscription->collection->slug !== 'pizza-ninjas') {
            abort(404);
        }

        return view('inscription', [
            'inscription' => $inscription,
        ]);
    }
}
