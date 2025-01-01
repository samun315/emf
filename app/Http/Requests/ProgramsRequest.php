<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProgramsRequest extends FormRequest
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
        if (isset($this->programs_id)) {

            return [
                'name'              => ['required', Rule::unique('programs')->ignore($this->programs_id)],
                'program_status'    => 'required',
                'status'            => 'required',
            ];
        }

        return [
            'name'              => 'required|unique:programs,name',
            'image'             => 'required',
            'program_status'    => 'required',
            'status'            => 'required',
        ];
    }
}
