<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class StatsController extends Controller
{
    public function pizza_pets(): JsonResponse
    {
        return response()->json();
    }
}
