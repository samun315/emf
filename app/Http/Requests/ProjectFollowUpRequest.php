<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFollowUpRequest extends FormRequest
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
        if (isset($this->project_follow_up_id)) {

            return [
                'title'             => 'required',
                'project_name'      => 'required',
                'details'           => 'required',
                'status'            => 'required',
            ];
        }

        return [
            'title'             => 'required',
            'project_name'      => 'required',
            'image_url'         => 'required',
            'attachment'        => 'required',
            'details'           => 'required',
            'status'            => 'required',
        ];
    }
}
