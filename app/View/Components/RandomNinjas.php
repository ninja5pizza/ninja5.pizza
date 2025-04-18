<?php

namespace App\View\Components;

use App\Models\PizzaNinja;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class RandomNinjas extends Component
{
    public Collection $records;

    public function __construct()
    {
        $this->records = PizzaNinja::inRandomOrder()
            ->limit(5)
            ->get();
    }

    public function render(): View
    {
        return view('components.random-ninjas');
    }
}
