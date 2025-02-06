<?php

namespace App\Http\Controllers;

use App\Models\PizzaNinja;
use Illuminate\View\View;

class InscriptionController extends Controller
{
    public function __invoke(PizzaNinja $inscription): View
    {
        return view('inscription', [
            'inscription' => $inscription,
        ]);
    }
}
