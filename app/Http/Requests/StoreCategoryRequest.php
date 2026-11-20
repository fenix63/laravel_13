<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
		return [
			'items'               => ['required', 'array', 'min:1'],
			'items.*.user_id'     => ['required', 'integer', 'exists:users,id'],
			'items.*.name'        => ['required', 'string', 'max:255'],
			'items.*.type'        => ['required', Rule::in(['income', 'expense'])]
		];
    }
}
