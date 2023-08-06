<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'father_job' => 'required|max:100',
            'mother_job' => 'required|max:100',
            'father_phone_number' => 'required|max:50',
            'mother_phone_number' => 'required|max:50',
            'address' => 'required|max:100',
            'consideration' => 'required|max:100',
            'birthday' => 'required|max:10',
            'major' => 'required|max:50',
            'user_id' => 'required|numeric',
        ];
    }
}
