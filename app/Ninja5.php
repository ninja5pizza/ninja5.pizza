<?php

namespace App;

use Illuminate\Support\Collection;

class ninja5
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
}
