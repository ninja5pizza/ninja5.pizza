<?php

namespace App;

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
        return $this->members->only('core')->collapse()->contains('inscription_id', $id);
    }

    public function getTwitterNameForInscriprionId(string $id): string
    {
        $member = $this->members->collapse()->filter(function ($value, $key) use ($id) {
            return $value['inscription_id'] === $id;
        })
            ->collapse();

        return $member->get('twitter_name', '');
    }

    public function getTwitterHandleForInscriprionId(string $id): string
    {
        $member = $this->members->collapse()->filter(function ($value, $key) use ($id) {
            return $value['inscription_id'] === $id;
        });

        return $member->keys()->first() ?? '';
    }

    public function fullSvgExistsForNumber(int $id)
    {
        return Storage::disk('ninjas')->exists($id.'.svg');
    }
}
