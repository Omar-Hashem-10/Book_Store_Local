<?php

namespace App\Http\Requests;

use App\Models\FlashSale;
use Illuminate\Foundation\Http\FormRequest;

class FlashSaleRequest extends FormRequest
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
                    if (FlashSale::whereJsonContains('name->en', $value)
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
                    if (FlashSale::whereJsonContains('name->ar', $value)
                        ->where('id', '!=', request()->category_id)
                        ->exists()) {
                        $fail('The Arabic name has already been taken.');
                    }
                }
            ],
            'description.en' => [
                'required',
                'string',
                'min:3',
                'max:255',
                function ($value, $fail) {
                    if (FlashSale::whereJsonContains('description->en', $value)
                        ->where('id', '!=', request()->category_id)
                        ->exists()) {
                        $fail('The English description has already been taken.');
                    }
                }
            ],
            'description.ar' => [
                'required',
                'string',
                'min:3',
                'max:255',
                function ($value, $fail) {
                    if (FlashSale::whereJsonContains('description->ar', $value)
                        ->where('id', '!=', request()->category_id)
                        ->exists()) {
                        $fail('The Arabic description has already been taken.');
                    }
                }
            ],
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|integer|min:0|max:1440',
            'is_active' => 'required|boolean'
        ];
    }
}
