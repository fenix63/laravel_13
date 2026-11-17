<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{

	/** @use HasFactory<\Database\Factories\TransactionFactory> */
	use HasFactory;


	/**
	 * Связь: транзакция принадлежит пользователю
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, 'id','user_id');
	}

	/**
	 * Связь: транзакция принадлежит категории
	 */
	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class, 'id','category_id');
	}
}
