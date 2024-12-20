<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'confirmed'
            ],

            //  name_of_the_primary_representative
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_initial' => ['nullable', 'string', 'max:1'],
            'extention' => ['nullable', 'string', 'max:20'],

            // address
            'purok' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255',],

            'facebook_url' => ['required', 'url', 'max:255'],
            'phone_number' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:11', 'max:11'],
            'age' => ['required', 'integer', 'min:1', 'max:120'],
            'sex' => ['required', 'string', 'in:male,female,other'],
            'duty_accomplished_registration_form' => ['required', 'file', 'mimes:pdf', 'max:102400'],
            'list_of_officers_and_adviser' => ['required', 'file', 'mimes:xls,xlsx', 'max:102400'],
            'list_of_member_in_good_standing' => ['required', 'file', 'mimes:xls,xlsx', 'max:102400'],
            'constitution_and_by_laws' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'endorsement_certification_from_proper_authority' => ['nullable', 'file', 'mimes:pdf', 'max:102400'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name_of_the_primary_representative' => $data['first_name'] . ' ' . strtoupper($data['middle_initial']) . '. ' . $data['last_name'] . ' ' . $data['extention'],
            'facebook_url' => $data['facebook_url'],
            'phone_number' => $data['phone_number'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'address' => $data['house_number'] . ' Purok' .$data['purok'] . ' ' .  ' ' . $data['barangay'] . ' Calamba City, Laguna', 
            // Handling file uploads
            'duty_accomplished_registration_form' => $data['duty_accomplished_registration_form']->store('organizationFiles', 'public'),
            'list_of_officers_and_adviser' => $data['list_of_officers_and_adviser']->store('organizationFiles', 'public'),
            'list_of_member_in_good_standing' => $data['list_of_member_in_good_standing']->store('organizationFiles', 'public'),
            'constitution_and_by_laws' => isset($data['constitution_and_by_laws']) ? $data['constitution_and_by_laws']->store('organizationFiles', 'public') : null,
            'endorsement_certification_from_proper_authority' => isset($data['endorsement_certification_from_proper_authority']) ? $data['endorsement_certification_from_proper_authority']->store('organizationFiles', 'public') : null,
        ])->assignRole(Role::findByName(UserTypeEnum::Organization->value));
    }
}
