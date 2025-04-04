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
                'EXISTS (SELECT 1 FROM json_each(meta) WHERE json_each.value->>\'trait\' LIKE ?)',
                [$tribes->get($tribe) . '%']
            )
            ->orderBy('name')
            ->paginate(5);

        return view('collection', [
            'inscriptions' => $inscriptions,
        ]);
    }
}
