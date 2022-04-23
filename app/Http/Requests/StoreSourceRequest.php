<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSourceRequest extends FormRequest
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
            'name' => 'required|max:255',
            'login' => 'required',
            'password' => 'required',
            'desc' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Необходимо указать имя источника',
            'desc.required' => 'Необходимо указать описание источника',
            'login.required' => 'Необходимо указать логин источника',
            'password.required' => 'Необходимо указать пароль источника',
        ];
    }
}
