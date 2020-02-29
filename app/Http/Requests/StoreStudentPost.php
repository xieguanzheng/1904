<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentPost extends FormRequest
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
            'username' => 'required','unique:study','regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9]{2,12}$/u'],
            'cj' => 'required|number|between:0,100',
        ];
    }
}
