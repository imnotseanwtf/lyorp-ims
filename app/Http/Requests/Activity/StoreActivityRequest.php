<?php

namespace App\Http\Requests\Activity;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
            'activity_name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'], // Ensure time is in the correct format (HH:MM)
            'venue' => ['required', 'string', 'max:255'],
            'specific_objectives' => ['required', 'string'],
            'specific_outputs' => ['required', 'string'],
            'topics' => ['required', 'array'],
            'topics.*' => ['string'], // Each topic should be a string
            'equipment' => ['required', 'array'],
            'equipment.*' => ['string'], // Each equipment should be a string
            'file' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
            'audience' => ['required', 'array'],
            'audience.*' => ['string'], // Each topic should be a string
            'others' => ['nullable', 'string'],
            'expected_number_of_participants' => ['required', 'integer'],
            'others_equipment' => ['nullable', 'string'],
        ];
    }
}
