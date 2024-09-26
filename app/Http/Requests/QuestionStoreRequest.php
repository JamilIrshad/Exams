<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
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
            //question string should have ? at the end
            'question' => 'required|string|ends_with:?',
            'exam' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'checkboxes' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' => 'Question cannot be empty.',
            'question.string' => 'Question cannot be something other than string.',
            'question.ends_with' => 'Add "?" at the end of the question.',
            'exam.required' => 'Exam is required.',
            'option1.required' => 'Option 1 is required.',
            'option2.required' => 'Option 2 is required.',
            'option3.required' => 'Option 3 is required.',
            'option4.required' => 'Option 4 is required.',
            'checkboxes.required' => 'Atleast one option should be selected.',
        ];
    }
}
