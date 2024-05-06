<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\rooms;
use App\Models\borrowers;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\borrowingItems>
 */
class BorrowingItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $RoomsIds = rooms::pluck('id')->toArray();
        $RoomsId = fake()->randomElement($RoomsIds);
        $borrowerIds = borrowers::pluck('id')->toArray();
        $borrowerId = fake()->randomElement($borrowerIds);

        return [
            'rooms_id' => $RoomsId,
            'borrowers_id' => $borrowerId,
            'date_borrowed' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'date_return' => fake()->dateTimeBetween('+1 day', '+2 weeks')->format('Y-m-d'),
            'status' => fake()->randomElement(['borrowed', 'returned']),
        ];
    }
}
