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
            'tribes' => (new PizzaNinja)->tribes(),
        ]);
    }

    public function tribe(string $tribe): View
    {
        $tribes = (new PizzaNinja)->tribes();
        $current_tribe = $tribes->get($tribe);

        $inscriptions = PizzaNinja::query()
            ->where('meta', 'LIKE', '%'.$current_tribe.'%')
            ->orderBy('name')
            ->paginate(5);

        return view('collection', [
            'inscriptions' => $inscriptions,
            'tribes' => $tribes,
            'current_tribe' => $tribe,
        ]);
    }
}
