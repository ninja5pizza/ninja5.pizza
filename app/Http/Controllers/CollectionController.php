<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\View\View;

class CollectionController extends Controller
{
    public function __invoke(): View
    {
        $inscriptions = Inscription::orderBy('name')->paginate(5);

        return view('collection', [
            'inscriptions' => $inscriptions,
        ]);
    }
}
