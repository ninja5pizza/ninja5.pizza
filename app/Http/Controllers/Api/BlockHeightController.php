<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class BlockHeightController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(
            Cache::get('bitcoin_block_height', default: [])
        );
    }
}
