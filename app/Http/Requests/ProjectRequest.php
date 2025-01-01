<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
        if (isset($this->project_id)) {

            return [
                'title'         => ['required', Rule::unique('projects')->ignore($this->project_id)],
                'details'       => 'required',
                'program_name'  => 'required',
                'deadline'      => 'required',
                'budget'        => 'required',
                'achieved'      => 'required',
                // 'banner_img'    => 'required',
                'project_status'  => 'required',
                'status'        => 'required',
            ];
        }

        return [
            'title'         => 'required|unique:projects,title',
            'details'       => 'required',
            'deadline'      => 'required',
            'program_name'  => 'required',
            'budget'        => 'required',
            'achieved'      => 'required',
            'banner_img'    => 'required',
            'status'        => 'required',
            'project_status'  => 'required',
        ];
    }
}
