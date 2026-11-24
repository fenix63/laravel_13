<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
	 * Авторизация: может ли текущий пользователь обновить эту категорию.
	 *  Вызывается ДО rules(). Если false — 403, валидация не запускается.
     */
    public function authorize(): bool
    {
		// Временно для отладки
		//dd($this->user(), auth()->user(), $this->route('category'));


		$category = $this->route('category');
		$instance = $category instanceof Category;
		$user = $this->user();
		$auth = auth()->user();

		$id = $this->user()->id === $category->user_id;

		return $category instanceof Category
			&& $this->user()->id === $category->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
	 * Правила валидации полей.
	 *  $this->route('category') — это модель из route model binding.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
		$category = $this->route('category');
        return [
			'name' => [
				'required',
				'string',
				'max:255',
				Rule::unique('categories', 'name')
					->where('user_id', $this->user()->id)
					->where('type', $this->input('type'))
					->ignore($category?->id),
			],
			'type' => ['required', 'in:income,expense']
        ];
    }
}
