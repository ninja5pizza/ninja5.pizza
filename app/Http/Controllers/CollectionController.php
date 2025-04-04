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

    public function tribe(string $tribe): View
    {
        $tribes = (new PizzaNinja())->tribes();

        $inscriptions = PizzaNinja::query()
            ->whereRaw(
                'EXISTS (SELECT 1 FROM JSON_TABLE(meta, "$[*]" COLUMNS(trait VARCHAR(255) PATH "$.trait")) as jt WHERE jt.trait LIKE ?)',
                [$tribes->get($tribe) . '%']
            )
            ->orderBy('name')
            ->paginate(5);

        return view('collection', [
            'inscriptions' => $inscriptions,
        ]);
    }
}
