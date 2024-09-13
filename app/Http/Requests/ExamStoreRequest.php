<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamStoreRequest extends FormRequest
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
            //minimum of 3 characters required for name
            'name' => 'required|string|min:3',
            //minimum of 10 characters required for description
            'description' => 'required|string|min:10',
            //date should be greater or equal to present date
            'exam_date' => $this->exam_date ? 'required|date|after_or_equal:today' : 'nullable|date|after_or_equal:today',
            //price should be a number
            'price' => 'required|numeric',
            //category should be a string
            'category' => 'required|string',
            //uploaded file should be an image, and should be of type jpeg, png, jpg, gif, svg, and should be less than 10MB
            //if route is update, then image is not required but if uploaded then it should be image
            'image' => $this->route()->named('exams.store') ? 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240' : 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240'

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'name.min' => 'Name should be minimum of 3 characters.',
            'description.required' => 'Description is required.',
            'description.min' => 'Description should be minimum of 10 characters.',
            'exam_date.required' => 'Exam date is required.',
            'exam_date.date' => 'Exam date should be a valid date.',
            'exam_date.after_or_equal' => 'Exam date should be today or a future date.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price should be a number.',
            'category.required' => 'Category is required.',
            'category.string' => 'Category should be a string.',
            'image.required' => 'Image is required.',
            'image.image' => 'Uploaded file should be an image.',
            'image.mimes' => 'Uploaded file should be of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Uploaded file should be less than 10MB.'
        ];
    }
}
