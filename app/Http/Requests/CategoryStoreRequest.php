<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:10'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.min' => 'Name should be minimum of 3 characters.',
            'description.required' => 'Description is required.',
            'description.min' => 'Description should be minimum of 10 characters.'
        ];
    }
}
