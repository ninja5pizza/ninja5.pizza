<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BlockHeightController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $data = Collection::make(
            Cache::get('bitcoin_block_height', default: [])
        )
            ->only([
                'name',
                'height',
                'time',
            ])
            ->transform(function ($item) {
                if (isset($item['time'])) {
                    $item['time'] = Carbon::parse($item['time'])->timestamp;
                }
                return $item;
            })
            ->toArray();

        return response()->json($data);
    }
}
