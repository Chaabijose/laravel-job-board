<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "bail|required|string|max:20|unique:post,title,{$this->input('id')}",
            'author' => 'required|string|max:20',
            'body' => 'required|string|max:255',
            'isPublished' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Field is required',
            'author.required' => 'Field is required',
            'body.required' => 'Field is required',
        ];
    }
}
