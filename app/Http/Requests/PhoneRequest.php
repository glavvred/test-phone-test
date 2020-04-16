<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'phone' => 'required|string',
        ];

        switch ($this->getMethod())
        {
            case 'POST':
            case 'PUT':
                return $rules;
            case 'DELETE':
                return [
                    'phone_id' => 'required|integer|exists:phones'
                ];
        }
        return [];
    }
}
