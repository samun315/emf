<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if (isset($this->id)) {
            return [
                'name'          => 'required',
                'email'         => 'required',
                'phone_number'  => 'required',
                'role_id'       => 'required',
                'status'        => 'required'
            ];
        }

        return [
            'name'          => 'required',
            'email'         => 'required',
            'phone_number'  => 'required',
            'password'      => 'required',
            'role_id'       => 'required',
            'status'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Please enter name',
            'email.required'        => 'Please enter email',
            'phone_number.required' => 'Please enter phone number',
            'role_id.required'      => 'Please enter role name',
            'role_id.required'      => 'Please select status',
        ];
    }
}
