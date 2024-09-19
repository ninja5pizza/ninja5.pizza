<?php

namespace App\Http\Controllers;

use App\Models\Inscription;

class InscriptionController extends Controller
{
    public function __invoke(Inscription $inscription)
    {
        return view('inscription', [
            'inscription' => $inscription,
        ]);
    }
}
