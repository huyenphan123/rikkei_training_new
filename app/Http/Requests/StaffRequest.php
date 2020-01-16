<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'name'=>'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password'=> 'required|min:8',
            'department_id'=>'required',
            'type'=>'required',
            'password_confirm'=>'required|same:password'

//            'phone_number'=> [
//                'bail',
//                'required',
//                'unique:users',
//                'numeric',
//                'regex:/^\+?(\([0-9]{1,4}\))?([0-9]{9,11})$/'
//            ],
//            'address'=>'bail|required|max:255',
//            'birthday'=>'bail|required|date',
//            'start_work'=>'bail|required|date',
//            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
    public function messages()
    {
        return [
          'department_id.required'=>' The department is not null',
            'role_id.required'=>' The department is not null'
        ];
    }
}
