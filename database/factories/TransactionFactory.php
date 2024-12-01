<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $amount = random_int(-9999999, 9999999) / 100;
        if ($amount < 0) {
            $isSuccess = random_int(0, 1);
        } else {
            $isSuccess = 1;
        }

        return [
            'amount' => $amount,
            'is_success' => $isSuccess,
            'description' => fake()->sentence(),
            'created_at' => fake()->dateTime()
        ];
    }
}
