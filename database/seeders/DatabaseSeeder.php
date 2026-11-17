<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Database\Factories\CustomUserFactory;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
		$newUserData = User::factory()->create();
		$newUserDataId = $newUserData->id;

		$category = Category::factory()->withUser($newUserDataId)->create();
		$categoryId = $category->id;

		$transaction = Transaction::factory()->withUser($newUserDataId, $categoryId)->create();
		$test = '123';
    }
}
