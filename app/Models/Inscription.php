<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function getShortenedInscriptionIdFor(string $id, $startLength = 5, $endLength = 5, $separator = '...'): string
    {
        return substr($id, 0, $startLength) . $separator . substr($id, -$endLength);
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
        $filePath = resource_path('svg/ninja_modules/'.$id.'.svg');

        if (File::exists($filePath)) {
             return filesize($filePath);
        }

        return 0;
    }

    public function getSvgComponentsInscriptionIds(): Collection
    {
        return (new Collection(
            $this->meta
        ))->pluck('id');
    }

    public function getTraitTypeForInscriptionId(string $id, $upper = true): string
    {
        $trait = (new Collection($this->meta))->where('id', $id)->first()['type'] ?? '';

        if ($upper) {
            return Str::of($trait)->upper();
        }

        return $trait;
    }
}
