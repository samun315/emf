<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
        if (isset($this->quote_id)) {
            return [
                'author_name'       => 'required',
                'title'             => 'required',
                'author_address'    => 'required',
                'details'           => 'required',
                'status'            => 'required'
            ];
        }

        return [
            'author_name'       => 'required',
            'author_address'    => 'required',
            'title'             => 'required',
            'details'           => 'required',
            'author_image'      => 'required',
            'status'            => 'required'
        ];
    }
}
