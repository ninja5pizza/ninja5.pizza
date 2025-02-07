<?php

namespace App\Http\Controllers;

use App\Models\PizzaNinja;
use Illuminate\View\View;

class CollectionController extends Controller
{
    public function __invoke(): View
    {
        $inscriptions = PizzaNinja::orderBy('name')
            ->paginate(5);

        return view('collection', [
            'inscriptions' => $inscriptions,
        ]);
    }
}
