<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            // Basic Information
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user())],
            'name_of_the_primary_representative' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:11', 'regex:/^([0-9\s\-\+\(\)]*)$/'],

            // Personal Information
            'age' => ['nullable', 'integer', 'min:1', 'max:150'],
            'sex' => ['nullable', 'string', 'in:male,female'],
            'address' => ['nullable', 'string', 'max:500'],

            // Social Media
            'facebook_url' => ['nullable', 'url', 'max:255'],

            // Documents
            'duty_accomplished_registration_form' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:102400'],
            'list_of_officers_and_adviser' => ['nullable', 'file', 'mimes:xls,xlsx', 'max:102400'],
            'list_of_member_in_good_standing' => ['nullable', 'file', 'mimes:xls,xlsx', 'max:102400'],
            'constitution_and_by_laws' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            'endorsement_certification_from_proper_authority' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:102400'],

            // Password Change
            'password' => ['nullable', 'string', 'confirmed', 'min:8'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}
