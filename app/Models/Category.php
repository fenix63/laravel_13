<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

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
	public function transactions(): HasMany
	{
		return $this->hasMany(Transaction::class, 'id','id');
	}
}
