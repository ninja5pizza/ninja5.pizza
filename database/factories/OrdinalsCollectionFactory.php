<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrdinalsCollectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
