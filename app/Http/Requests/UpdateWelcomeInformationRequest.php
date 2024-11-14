<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWelcomeInformationRequest extends FormRequest
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
            'address'   => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'email_two' => 'required|email|max:255',
            'number'    => 'required|string',
            'facebook'  => 'required|url|max:255',
        ];
    }
}
