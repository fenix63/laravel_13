<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
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
	public function categories(): BelongsTo
	{
		return $this->belongsTo(Category::class, 'user_id','id');
	}
}
