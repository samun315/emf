<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectGalleryRequest extends FormRequest
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
        if (isset($this->project_gallery_id)) {

            return [
                'project_name'  => 'required',
                'caption'     => 'required',
                'status'      => 'required',
            ];
        }

        return [
            'project_name'   => 'required',
            'caption'  => 'required',
            'image'    => 'required',
            'status'   => 'required'
        ];
    }
}
