<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => [
                'required',
                'unique:products',
                'active_url',
                'regex:/(https\:\/\/fabelio.com\/ip\/)+([a-z0-9\-]*)+(.html)/i'
            ],
        ];
    }

    public function messages()
    {
        return [
            'url.unique' => 'The :attribute already added into system.',
            'url.regex' => 'The :attribute value must be a product url from fabelio website.',
        ];
    }
}
