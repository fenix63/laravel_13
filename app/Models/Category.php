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
use Illuminate\Support\Facades\Schema;

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

	public static function add(Request $request)
	{
		$columns = Schema::getColumnListing('categories');
		$keyToDelete = ['id','created_at','updated_at'];

		foreach ($keyToDelete as $key) {
			$index = array_search($key, $columns);
			if ($index !== false) {
				unset($columns[$index]);
			}
		}

		$items = $request->input('items');
		$dataToAdd = [];
		foreach($items as $item){
			foreach ($columns as $column) {
				$itemToAdd[$column] = $item[$column];
			}
			$dataToAdd[] = $itemToAdd;
		}

		$result = Category::insert($dataToAdd);
		return $result;
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
