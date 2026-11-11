<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

	/**
	 * Связь: у категории несколько пользователей.
	 */
	public function user(): HasMany
	{
		return $this->hasMany(User::class, 'id','user_id');
	}

	/**
	 * Связь: у категории много транзакций.
	 */
	public function transactions(): HasMany
	{
		return $this->hasMany(Transaction::class, 'id','id');
	}
}
