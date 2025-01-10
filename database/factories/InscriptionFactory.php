<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscription>
 */
class InscriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'inscription_id' => $this->generateOrdinalsInscriptionId(),
            'created_at' => now(),
        ];
    }

    private function generateOrdinalsInscriptionId(): string
    {
        $txid = $this->faker->regexify('[a-f0-9]{64}');

        $index = $this->faker->numberBetween(0, 9);

        return $txid.'i'.$index;
    }
}
