<?php

namespace Database\Factories;

use App\Models\items;
use App\Models\rooms;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\roomInventory>
 */
class RoomInventoryFactory extends Factory
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
        $itemsIds = items::pluck('id')->toArray();
        $itemsId = fake()->randomElement($itemsIds);
        return [
            'rooms_id' => $roomId,
            'items_id' => $itemsId,
            'quantity' => fake()->numberBetween(1, 100),
        ];
    }
}
