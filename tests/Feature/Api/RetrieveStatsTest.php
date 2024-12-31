<?php

namespace Tests\Feature\Api;

use App\Models\FloorPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RetrieveStatsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_request_to_the_stats_api_for_pizza_pets_should_return_a_200_status_code(): void
    {
        FloorPrice::factory()->create([
            'symbol' => 'pizza-pets',
        ]);

        $this->get('/api/stats/pizza-pets')->assertOk();
    }
}
