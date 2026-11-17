<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\JsonResponse;

class Category extends Model
{

	use HasFactory, Notifiable;
	/**
	 * Связь: Категория принадлежит пользователю
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, 'id','user_id');
	}

	/**
	 * Связь: у категории много транзакций.
	 */
	public function transaction(): HasMany
	{
		return $this->hasMany(Transaction::class, 'id','id');
	}

	/**Список категорий текущего пользователя
	 * @return void
	 */
	public static function index(string $userId): JsonResponse
	{
		return response()->json([
			'result' => Category::query()
				->where('user_id', $userId)
				->get(),
		]);

	}
}
