<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        if (isset($this->slider_id)) {
            return [
                'tagline'       => 'required',
                'title'         => 'required',
                'description'   => 'required',
                'status'        => 'required'
            ];
        }

        return [
            'tagline'       => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'banner_img'    => 'required',
            'status'        => 'required'
        ];
    }
}
