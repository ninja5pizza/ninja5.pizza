<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marslander>
 */
class InscriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => 10,
            'name' => 'Pizza Ninjas #1',
            'inscription_id' => '9ad43b591e58b23d8550dfdae431432b6ea3a7079d09ef80ee1554c5a3f8d543i0',
            'created_at' => now(),
        ];
    }
}
