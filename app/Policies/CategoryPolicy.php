<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
	 * Может ли пользователь просматривать список категорий.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
	 * Может ли пользователь смотреть конкретную категорию.
     */
    public function view(User $user, Category $category): bool
    {
        //return false;
		return $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can create models.
	 * Может ли пользователь создавать категории.
     */
    public function create(User $user): bool
    {
        //return false;
        return true;
    }

    /**
     * Determine whether the user can update the model.
	 * Может ли пользователь обновлять категорию.
	 * Ключевая проверка: категория должна принадлежать этому пользователю.
     */
    public function update(User $user, Category $category): bool
    {
        //return false;
		return $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can delete the model.
	 * Может ли пользователь удалять категорию.
     */
    public function delete(User $user, Category $category): bool
    {
        //return false;
		return $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can restore the model.
	 * Может ли пользователь восстановить модель
     */
    public function restore(User $user, Category $category): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
	 * Может ли пользователь безвозвратно удалить модель.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return false;
    }
}
