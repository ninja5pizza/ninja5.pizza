<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RetrieveChartDataTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_request_to_the_chart_api_for_pizza_ninjas_should_return_a_200_status_code(): void
    {
        $this->get('/api/chart/pizza-ninjas')->assertOk();
    }

    #[Test]
    public function a_request_to_the_chart_api_for_pizza_pets_should_return_a_200_status_code(): void
    {
        $this->get('/api/chart/pizza-pets')->assertOk();
    }
}
