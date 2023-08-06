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
            'f_name' => 'required|max:50',
            'l_name' => 'required|max:50',
            'father_name' => 'required|max:50',
            'national_code' => 'required|max:10',
            'gender' => 'required|numeric|max:2',
            'role' => 'required|numeric|max:3',
            'email' => 'required|email|max:100',
            'password' => 'required|max:20|min:5',
        ];
    }
}
