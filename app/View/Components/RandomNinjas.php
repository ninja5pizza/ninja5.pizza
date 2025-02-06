<?php

namespace App\View\Components;

use App\Models\PizzaNinja;
use App\Models\Inscription;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RandomNinjas extends Component
{
    public Collection $records;

    public function __construct()
    {
        $this->records = PizzaNinja::whereHas('collection', function (Builder $query) {
            $query->where('slug', 'pizza-ninjas');
        })
            ->inRandomOrder()
            ->limit(5)
            ->get();
    }

    public function render(): View
    {
        return view('components.random-ninjas');
    }
}
