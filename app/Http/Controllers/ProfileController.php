<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\WelcomeInformation;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $welcome = WelcomeInformation::findOrFail(1);

        return view('auth.profile', compact('welcome'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

        // Handle password update if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        // Handle file uploads
        $fileFields = [
            'duty_accomplished_registration_form',
            'list_of_officers_and_adviser',
            'list_of_member_in_good_standing',
            'constitution_and_by_laws',
            'endorsement_certification_from_proper_authority',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($user->$field) {
                    Storage::disk('public')->delete($user->$field);
                }

                // Store new file
                $data[$field] = $request->file($field)->store('organizationFiles', 'public');
            } else {
                unset($data[$field]); // Remove from data if no new file
            }
        }

        // Update user attributes
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'name_of_the_primary_representative' => $data['name_of_the_primary_representative'] ?? null,
            'facebook_url' => $data['facebook_url'] ?? null,
            'phone_number' => $data['phone_number'] ?? null,
            'age' => $data['age'] ?? null,
            'sex' => $data['sex'] ?? null,
            'address' => $data['address'] ?? null,
        ]);

        // Update password explicitly if it was provided
        if (isset($data['password'])) {
            $user->update(['password' => $data['password']]);
        }

        // Update file fields if they exist in data
        foreach ($fileFields as $field) {
            if (isset($data[$field])) {
                $user->update([$field => $data[$field]]);
            }
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
