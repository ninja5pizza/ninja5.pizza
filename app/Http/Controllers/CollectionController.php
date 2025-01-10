<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class CollectionController extends Controller
{
    public function __invoke(): View
    {
        $inscriptions = Inscription::whereHas('collection', function (Builder $query) {
            $query->where('slug', 'pizza-ninjas');
        })
            ->orderBy('name')
            ->paginate(5);

        return view('collection', [
            'inscriptions' => $inscriptions,
        ]);
    }
}
