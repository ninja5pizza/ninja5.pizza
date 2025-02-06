<?php

namespace App\Http\Controllers;

use App\Models\PizzaNinja;
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

        $searchQuery = Str::of($validated['query'])->after('#')->toString();

        $inscription = PizzaNinja::where(function (Builder $query) use ($searchQuery) {
            $query->where('name', 'LIKE', "%#{$searchQuery}")
                ->orWhere('inscription_id', $searchQuery);
        })
            ->orderBy('name')
            ->first();

        if ($inscription) {
            return redirect()->route('inscription', $inscription);
        }

        return redirect()->back()->with('error', 'No Pizza Ninja found with the given query.');
    }
}
