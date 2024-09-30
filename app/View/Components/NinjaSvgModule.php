<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class NinjaSvgModule extends Component
{
    public function __construct(
        public string $inscriptionId
    ) {
        //
    }

    public function render(): string
    {
        return Storage::disk('ninja_modules')->get($this->inscriptionId.'.svg');
    }
}
