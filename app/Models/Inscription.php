<?php

namespace App\Models;

use App\Traits\HasBtcLoongArt;
use App\Traits\HasJasmineArt;
use App\Traits\HasMoodzAnimations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Inscription extends Model
{
    use HasFactory, HasMoodzAnimations, HasBtcLoongArt, HasJasmineArt;

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

    public function fullSvgExists(): bool
    {
        if (Storage::disk('ninjas')->exists(
            $this->getInternalCollectionId().'.svg'
        )) {
            return true;
        }

        return false;
    }

    public function getInternalCollectionId(): int
    {
        return (int) Str::of($this->name)
            ->trim()
            ->after('#')
            ->toString();
    }

    public function getShortenedInscriptionIdFor(string $id, $startLength = 8, $endLength = 8, $separator = '....'): string
    {
        return substr($id, 0, $startLength).$separator.substr($id, -$endLength);
    }

    public function getSvgComponentCount(): int
    {
        return (new Collection(
            $this->meta
        ))->count();
    }

    public function getSvgComponentsTotalFileSize(): int
    {
        return $this->getSvgComponentsInscriptionIds()->reduce(function ($size, $id) {
            return $size + $this->getSvgComponentFileSizeForId($id);
        }, 0);
    }

    public function getSvgComponentFileSizeForId(string $id): int
    {
        $file = $id.'.svg';

        if (Storage::disk('ninja_components')->exists($file)) {
            return Storage::disk('ninja_components')->size($file);
        }

        return 0;
    }

    public function getSvgComponentsInscriptionIds(): Collection
    {
        return (new Collection(
            $this->meta
        ))->pluck('id');
    }

    public function getConfigForInscriptionId(string $id): array
    {
        return (new Collection($this->meta))
            ->where('id', $id)
            ->first();
    }

    public function getRawTraitForInscriptionId(string $id, $withSuffix = false): string
    {
        $string = (new Collection($this->meta))
            ->where('id', $id)
            ->first()['trait'] ?? '';

        if ($withSuffix) {
            return $string;
        }

        return Str::of($string)->before('.svg')->toString();
    }

    public function getTraitForInscriptionId(string $id): Collection
    {
        $rawString = $this->getRawTraitForInscriptionId($id);

        return Str::of($rawString)->split('/\__+/')->map(function ($item) {
            return Str::of($item)->headline();
        });
    }

    public function getTraitTypeForInscriptionId(string $id, $upper = true): string
    {
        $trait = (new Collection($this->meta))
            ->where('id', $id)
            ->first()['type'] ?? '';

        if ($upper) {
            return Str::of($trait)->upper();
        }

        return $trait;
    }
}
