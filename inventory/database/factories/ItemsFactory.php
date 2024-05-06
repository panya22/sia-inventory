<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\rooms;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roomIds = rooms::pluck('id')->toArray();
        $roomId = fake()->randomElement($roomIds);

        return [
            'rooms_id' => $roomId,
            'items_name' => fake()->word,
            'items_quantity' => fake()->numberBetween(1, 100),
        ];
    }
}
