<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'unique:users,email,'.$this->id,
            'password' => 'string|min:4',
            'paternal_name' => 'string',
            'maternal_name' => 'string',
            'birthday' => 'date',
            'address' => 'string',
            'phone' => 'digits:10,13',
            'contact_name' => 'string',
            'comments' => 'string|nullable',
        ];
    }
}
