<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'query' => [
                'required',
                'string',
                'max:68',
            ],
        ]);

        $query = Str::of($validated['query'])->after('#')->toString();

        $inscription = Inscription::whereHas('collection', function (Builder $query) {
            $query->where('slug', 'pizza-ninjas');
        })
            ->where('name', 'LIKE', "%#{$query}")
            ->orWhere('inscription_id', $query)
            ->orderBy('name')
            ->first();

        if ($inscription) {
            return redirect()->route('inscription', $inscription);
        }

        return redirect()->back()->with('error', 'No Pizza Ninja found with the given query.');
    }
}
