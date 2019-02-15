<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'cpf' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'address' => ['required', 'string'],
            'number' => ['required', 'int'],
            'district' => ['required', 'string'],
            'uf' => ['required', 'string', 'max:2'],
            'city' => ['required', 'string'],
        ];
    }
}
