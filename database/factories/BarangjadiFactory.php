<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barangjadi>
 */
class BarangjadiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_bj' => $this->faker->unique()
                    ->numberBetween($min = 2101, $max = 2120),
            'nama' => 'Cotton',
            'stock_min' => 1000,
            'stock' => 2000,
        ];
    }
}
