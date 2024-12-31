<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FloorPrice>
 */
class FloorPriceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'symbol' => 'ninja5',
            'supply' => 1000,
            'owners' => 500,
            'listed' => 100,
            'price_in_sats' => 999999,
        ];
    }
}
