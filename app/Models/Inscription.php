<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'inscription_id',
        'name',
    ];

    protected function casts(): array
    {
        return [
            'meta' => 'array',
        ];
    }

    public function getInternalCollectionId(): int
    {
        return (int) Str::of($this->name)
            ->trim()
            ->after('#')
            ->__toString();
    }

    public function getSvgComponentsInscriptionIds(): Collection
    {
        return (new Collection(
            $this->meta
        ))->pluck('id');
    }
}
