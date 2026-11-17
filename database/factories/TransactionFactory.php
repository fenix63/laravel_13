<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
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
		return [
			'user_id' => 2,
			'category_id' => 1,
			'amount' => $this->faker->randomFloat(8, 2),
			'date' => $this->faker->date(),
		];
    }

	/**
	 * Когда надо добавить свой параметр
	 * @param int $userId
	 * @return TransactionFactory|Factory
	 */
	public function withUser(int $userId, int $categoryId)
	{
		return $this->state(fn (array $attributes) => [
			'user_id' => $userId,
			'category_id' => $categoryId,
		]);
	}
}
