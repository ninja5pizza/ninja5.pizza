<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FloorPrice extends Model
{
    const UPDATED_AT = null;

    protected $casts = [
        'owners' => 'integer',
        'supply' => 'integer',
        'listed' => 'integer',
    ];
}
