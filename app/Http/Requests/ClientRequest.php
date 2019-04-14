<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Client;
use Illuminate\Validation\Rule;
class ClientRequest extends FormRequest
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
            'name' => [
                'required', 'min:6'
            ],
            'email' => [
                'required', 'email', Rule::unique((new Client)->getTable())->ignore($this->route()->client->id ?? null)
            ],
            'location' => [
                'required', 'min:6'
            ],
            'contact' => [
                'required',  'min:6'
            ]
            ,
            'phone' => [
                'required',  'min:6'
            ]
        ];
    }
}
