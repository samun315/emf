<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberGalleryRequest extends FormRequest
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
        if (isset($this->member_gallery_id)) {
            return [
                'member_name' => 'required',
                'caption' => 'required',
                'status' => 'required',
            ];
        }

        return [
            'member_name' => 'required',
            'caption' => 'required',
            'image' => 'required',
            'status' => 'required'
        ];
    }
}
