<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$userIdList = User::getUserIdList();

		return [
			'user_id' => $this->faker->randomElement($userIdList),
			'name' => $this->faker->name(),
			'type' => $this->faker->randomElement(['income', 'expense'])
		];
    }

	/**
	 * Когда надо добавить свой параметр
	 * @param int $userId
	 * @return CategoryFactory|Factory
	 */
	public function withUser(int $userId)
	{
		return $this->state(fn (array $attributes) => [
			'user_id' => $userId,
		]);
	}
}
