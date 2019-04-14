<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;
use Illuminate\Validation\Rule;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'variety' => [
                'required', 'min:3',
            ],
            'length' => [
                'required', 'min:3'
            ],
            'stems' => [
                'required','min:3','integer'
            ]

        ];
    }
}
