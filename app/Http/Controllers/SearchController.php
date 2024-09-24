<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'query' => [
                'required',
                'string',
                'max:65',
            ],
        ]);

        $query = $validated['query'];

        $inscription = Inscription::where('name', 'LIKE', "%#{$query}")
            ->orWhere('inscription_id', 'LIKE', "%{$query}%")
            ->first();

        if ($inscription) {
            return redirect()->route('inscription', $inscription);
        }

        return redirect()->back()->with('error', 'No Pizza Ninja found with the given query.');
    }
}
