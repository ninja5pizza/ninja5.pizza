<?php

namespace App\Http\Controllers;

use App\Models\PizzaNinja;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class CollectionController extends Controller
{
    public function __invoke(): View
    {
        $inscriptions = PizzaNinja::whereHas('collection', function (Builder $query) {
            $query->where('slug', 'pizza-ninjas');
        })
            ->orderBy('name')
            ->paginate(5);

        return view('collection', [
            'inscriptions' => $inscriptions,
        ]);
    }
}
