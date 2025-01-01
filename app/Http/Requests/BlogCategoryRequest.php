<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogCategoryRequest extends FormRequest
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
        if (isset($this->blog_category_id)) {

            return [
                'title'    => ['required', Rule::unique('blog_categories')->ignore($this->blog_category_id)],
                'status'  => 'required',
            ];
        }

        return [
            'title'      => 'required|unique:blog_categories,title',
            'status'    => 'required',
        ];
    }
}
