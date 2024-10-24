<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\RedirectResponse;

class PizzaNinjaController extends Controller
{
    public function __invoke(int $id): RedirectResponse
    {
        $inscription = Inscription::where('name', 'LIKE', "%#{$id}")
            ->first();

        if (! $inscription) {
            abort(404);
        }

        return redirect('/inscription/'.$inscription->inscription_id);
    }
}
