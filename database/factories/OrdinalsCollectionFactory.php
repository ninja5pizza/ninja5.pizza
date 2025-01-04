<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrdinalsCollectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => 1,
            'name' => 'Pizza Ninjas',
            'slug' => 'pizza-ninjas',
        ];
    }
}
