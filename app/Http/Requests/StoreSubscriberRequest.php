<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriberRequest extends FormRequest
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
            'desc' => 'required',
            'phone' => 'required',
            'gid' => 'required|exists:mysql.groups,id'
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
            'name.required' => 'Необходимо указать имя подписчика',
            'desc.required' => 'Необходимо указать описание подписчика',
            'phone.required' => 'Необходимо указать телефон подписчика',
        ];
    }
}
