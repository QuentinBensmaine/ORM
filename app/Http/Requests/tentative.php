<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tentative extends FormRequest
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
            'emp_no' => 'integer | required',
            'birth_date' => 'date | required',
            'hire_date' => 'date | after:birth_date',
            'first_name' => 'string |max:255',
            'last_name' => 'string |max:255',
            'gender' => 'string|in:M,F',
        ];
    }
}
