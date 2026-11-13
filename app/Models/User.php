<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

	public static function getUserIdList(): array
	{
		//$usersData =  self::all(['id']);
		$usersData =  self::query()->pluck('id')->all();
		return $usersData;
	}
	
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

	/**
	 * Связь: у пользователя много категорий.
	 */
	public function categories(): HasMany
	{
		return $this->hasMany(Category::class, 'user_id','id');
	}

	/**
	 * Связь: у пользователя много транзакций.
	 */
	public function transactions(): HasMany
	{
		return $this->hasMany(Transaction::class, 'user_id','id');
	}
}
