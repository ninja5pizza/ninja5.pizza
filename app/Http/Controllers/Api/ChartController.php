<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FloorPricesCollection;
use App\Models\FloorPrice;

class ChartController extends Controller
{
    public function pizza_pets(): FloorPricesCollection
    {
        return new FloorPricesCollection(
            FloorPrice::where('symbol', 'pizza-pets')
                ->take(1000)
                ->latest()
                ->get()
                ->reverse()
        );
    }

    public function pizza_ninjas(): FloorPricesCollection
    {
        return new FloorPricesCollection(
            FloorPrice::where('symbol', 'pizza-ninjas')
                ->take(1000)
                ->latest()
                ->get()
                ->reverse()
        );
    }
}
