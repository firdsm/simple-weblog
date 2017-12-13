<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class RegistrationForm extends FormRequest
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
            'username' => 'required|unique:users|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {
        $user = User::create($this->only(['name', 'username', 'email', 'password']));

        auth()->login($user);
    }
}
