<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email|max:255',
            'password'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>' The email is not null',
            'email.email' => 'The email is not correct format',
            'password.required'=>' The password is not null'
        ];
    }
}
