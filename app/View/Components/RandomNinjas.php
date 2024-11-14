<?php

namespace App\View\Components;

use App\Models\Inscription;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class RandomNinjas extends Component
{
    public Collection $records;

    public function __construct()
    {
        $this->records = Inscription::inRandomOrder()->limit(5)->get();
    }

    public function render(): View
    {
        return view('components.random-ninjas');
    }
}
