<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartRequest extends FormRequest
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

            'name'=>'bail|required|max:255',
            'description' => 'bail|required|max:255',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Name Department is not empty!',
          'name.max'=> 'Length is not over 255',
          'description.required'=>'Description is not empty!',

        ];
    }
}
