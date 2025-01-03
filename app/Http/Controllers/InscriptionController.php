<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\View\View;

class InscriptionController extends Controller
{
    public function __invoke(Inscription $inscription): View
    {
        return view('inscription', [
            'inscription' => $inscription,
        ]);
    }
}
