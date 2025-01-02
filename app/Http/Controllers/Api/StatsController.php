<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FloorPrice;
use Illuminate\Http\JsonResponse;

class StatsController extends Controller
{
    public function pizza_pets(): JsonResponse
    {
        $model = FloorPrice::where('symbol', 'pizza-pets')
            ->latest()
            ->first();

        $total_count = 58196;
        $alive_count = $model->supply;
        $dead_count = $total_count - $alive_count;

        return response()->json([
            'total_count' => $total_count,
            'alive_count' => $alive_count,
            'dead_count' => $dead_count,
            'owner_count' => $model->owners,
            'listed_for_sale' => $model->listed,
        ]);
    }
}
