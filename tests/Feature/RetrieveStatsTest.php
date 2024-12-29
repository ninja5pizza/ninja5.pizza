<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RetrieveStatsTest extends TestCase
{
    #[Test]
    public function a_request_to_the_stats_api_for_pizza_pets_should_return_a_200_status_code(): void
    {
        $this->get('/api/stats/pizza-pets')->assertOk();
    }
}
