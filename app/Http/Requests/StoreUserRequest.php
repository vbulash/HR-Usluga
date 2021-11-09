<?php

namespace App\Http\Requests;

use App\Rules\UserClientsRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'roles' => 'required',
            'clients' => new UserClientsRule($this)
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ФИО',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'phone' => 'Телефон',
            'roles' => 'Роли'
        ];
    }
}
