<?php

namespace App\Http\Requests\Certificate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCertificateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validation for logo fields
            'left_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],  // Example: max 2MB image
            'right_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],  // Example: max 2MB image

            // Validation for signature and name fields
            'left_signiture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'left_name' => ['nullable', 'string', 'max:255'],

            'right_signiture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'right_name' => ['nullable', 'string', 'max:255'],

            'middle_signiture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'middle_name' => ['nullable', 'string', 'max:255'],
        ];
    }
}
