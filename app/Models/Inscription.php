<?php

namespace App\Models;

use App\Traits\HasBtcLoongArt;
use App\Traits\HasJasmineArt;
use App\Traits\HasMcaChefArt;
use App\Traits\HasMoodzAnimations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Inscription extends Model
{
    use HasBtcLoongArt, HasFactory, HasJasmineArt, HasMcaChefArt, HasMoodzAnimations, HasSEO;

    const UPDATED_AT = null;

    protected $fillable = [
        'inscription_id',
        'name',
        'created_at_block',
    ];

    protected function casts(): array
    {
        return [
            'meta' => 'array',
            'created_at_block' => 'integer',
        ];
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(OrdinalsCollection::class, 'collection_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Inscription::class, 'parent_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Inscription::class, 'parent_id', 'id');
    }

    public function getShortenedInscriptionIdFor(string $id, $startLength = 8, $endLength = 8, $separator = '....'): string
    {
        return substr($id, 0, $startLength).$separator.substr($id, -$endLength);
    }
}
