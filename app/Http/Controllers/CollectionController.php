<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Inscription;

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
