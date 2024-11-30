<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FloorPricesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'time' => $this->created_at->getTimeStamp(),
            'value' => $this->price_in_sats / 100000000,
        ];
    }
}
