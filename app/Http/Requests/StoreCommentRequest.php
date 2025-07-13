<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => 'required|string|max:20',
            'content' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Field is required',
            'content.required' => 'Field is required',
        ];
    }
}
