<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class dept extends FormRequest
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
            'dept_no' => 'required|regex/^d[0-9]{3}$|unique:departments',
            'dept_name' => 'string |max:40 | required',
        ];
    }
}
