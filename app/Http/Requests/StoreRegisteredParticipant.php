<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisteredParticipant extends FormRequest
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
            'activity_request_id' => ['required', 'exists:activity_requests,id'],
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer'],
            'gender' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'name_of_organization' => ['required', 'string', 'max:255'],
        ];
    }
}
