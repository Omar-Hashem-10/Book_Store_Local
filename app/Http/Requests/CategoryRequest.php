<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name.en' => [
                'required',
                'string',
                'min:3',
                'max:255',
                function ($value, $fail) {
                    if (Category::whereJsonContains('name->en', $value)
                        ->where('id', '!=', request()->category_id)
                        ->exists()) {
                        $fail('The English name has already been taken.');
                    }
                }
            ],
            'name.ar' => [
                'required',
                'string',
                'min:3',
                'max:255',
                function ($value, $fail) {
                    if (Category::whereJsonContains('name->ar', $value)
                        ->where('id', '!=', request()->category_id)
                        ->exists()) {
                        $fail('The Arabic name has already been taken.');
                    }
                }
            ],
        ];

    }
}
