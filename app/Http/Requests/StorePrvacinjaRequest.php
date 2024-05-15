<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrvacinjaRequest extends FormRequest
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
            "title"=> "required",
            "document_path" => 'required|file|mimes:pdf|max:2048',
            "year"=> "required",
            "type"=> "required",
        ];
    }
     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Назив документа је обавезан.',
            'document_path.required' => 'The document path field is required.',
            'document_path.file' => 'The document path must be a file.',
            'document_path.mimes' => 'The document must be a PDF file.',
            'document_path.max' => 'The document size must not exceed 2 MB.',
            'year.required' => 'The year field is required.',
            'type.required' => 'The type field is required.',
        ];
    }
}
