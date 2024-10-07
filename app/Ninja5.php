<?php

namespace App;

use App\Models\Inscription;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Ninja5
{
    public Collection $members;

    public function __construct(array $attributes = [])
    {
        $this->members = new Collection($attributes);
    }

    public function isCoreMemberForInscriptionId(string $id): bool
    {
        return $this->members->contains('inscription_id', $id);
    }

    public function fullSvgExistsForNumber(int $id)
    {
        return Storage::disk('ninjas')->exists($id.'.svg');
    }
}
