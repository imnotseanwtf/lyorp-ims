@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('My Profile') }}</h2>
                </div>
            </div>
            @admin
                <div class="col-md-6">
                    <div class="title mb-30 text-end">
                        <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                            Home Information
                        </button>
                    </div>
                </div>
            @endadmin
        </div>
    </div>

    {{-- CREATE --}}

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>

                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ route('information') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter address"
                                value="{{ old('address', $welcome->address) }}" required>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ old('email', $welcome->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="email_two">Secondary Email</label>
                            <input type="email" class="form-control" name="email_two" placeholder="Enter secondary email"
                                value="{{ old('email_two', $welcome->email_two) }}">
                            @error('email_two')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="number">Phone Number</label>
                            <input type="text" class="form-control" name="number" placeholder="Enter phone number"
                                value="{{ old('number', $welcome->number) }}" required>
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group mt-3">
                            <label for="facebook">Facebook</label>
                            <input type="url" class="form-control" name="facebook" placeholder="Enter Facebook URL"
                                value="{{ old('facebook', $welcome->facebook) }}" required>
                            @error('facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                @session('success')
                    <div class="alert-box success-alert">
                        <div class="alert">
                            <h4 class="alert-heading">Success</h4>
                            <p class="text-medium">
                                {{ $value }}
                            </p>
                        </div>
                    </div>
                @endsession

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-12">
                            <h4 class="mb-4">Basic Information</h4>
                        </div>

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" @error('name') class="form-control is-invalid" @enderror
                                    name="name" id="name" placeholder="{{ __('Name') }}"
                                    value="{{ old('name', auth()->user()->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="email">{{ __('Email') }}</label>
                                <input @error('email') class="form-control is-invalid" @enderror type="email"
                                    name="email" id="email" placeholder="{{ __('Email') }}"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @organization
                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label
                                        for="name_of_the_primary_representative">{{ __('Primary Representative Name') }}</label>
                                    <input type="text"
                                        @error('name_of_the_primary_representative') class="form-control is-invalid" @enderror
                                        name="name_of_the_primary_representative" id="name_of_the_primary_representative"
                                        value="{{ old('name_of_the_primary_representative', auth()->user()->name_of_the_primary_representative) }}"
                                        placeholder="{{ __('Primary Representative Name') }}" required>
                                    @error('name_of_the_primary_representative')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label
                                        for="phone_number">{{ __('Phone Number (Number must start with 0 and contain exactly 11 digits.)') }}</label>
                                    <input type="tel" @error('phone_number') class="form-control is-invalid" @enderror
                                        name="phone_number" id="phone_number" placeholder="{{ __('Phone Number') }}"
                                        value="{{ old('phone_number', auth()->user()->phone_number) }}" required
                                        autocomplete="phone_number" autofocus maxlength="11" pattern="^0\d{10}$"
                                        title="{{ __('Phone number must start with 0 and contain exactly 11 digits.') }}">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="col-12">
                                <h4 class="mb-4 mt-4">Personal Information</h4>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label for="age">{{ __('Age') }}</label>
                                    <input type="number" @error('age') class="form-control is-invalid" @enderror
                                        name="age" id="age" value="{{ old('age', auth()->user()->age) }}"
                                        placeholder="{{ __('Age') }}" required>
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label for="sex">{{ __('Sex') }}</label>
                                    <select name="sex" id="sex" required
                                        @error('sex') class="form-control is-invalid" @enderror>
                                        <option value="">{{ __('Select Sex') }}</option>
                                        <option value="male"
                                            {{ old('sex', auth()->user()->sex) === 'male' ? 'selected' : '' }}>
                                            {{ __('Male') }}</option>
                                        <option value="female"
                                            {{ old('sex', auth()->user()->sex) === 'female' ? 'selected' : '' }}>
                                            {{ __('Female') }}</option>
                                    </select>
                                    @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="address">{{ __('Address') }}</label>
                                    <textarea name="address" id="address" @error('address') class="form-control is-invalid" @enderror rows="3"
                                        placeholder="{{ __('Address') }}" required>{{ old('address', auth()->user()->address) }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Social Media -->
                            <div class="col-12">
                                <h4 class="mb-4 mt-4">Social Media</h4>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="facebook_url">{{ __('Facebook URL') }}</label>
                                    <input type="url" @error('facebook_url') class="form-control is-invalid" @enderror
                                        name="facebook_url" id="facebook_url"
                                        value="{{ old('facebook_url', auth()->user()->facebook_url) }}"
                                        placeholder="{{ __('Facebook URL') }}" required>
                                    @error('facebook_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Documents -->
                            <div class="col-12">
                                <h4 class="mb-4 mt-4">Documents</h4>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Duty Accomplished Registration Form (PDF, 10MB)</label>
                                    <input type="file" name="duty_accomplished_registration_form"
                                        class="@error('duty_accomplished_registration_form') is-invalid @enderror">
                                    @error('duty_accomplished_registration_form')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>List of Officers and Adviser (Excel, 10MB)</label>
                                    <input type="file" name="list_of_officers_and_adviser"
                                        class="@error('list_of_officers_and_adviser') is-invalid @enderror">
                                    @error('list_of_officers_and_adviser')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>List of Members in Good Standing (Excel, 10MB)</label>
                                    <input type="file" name="list_of_member_in_good_standing"
                                        class="@error('list_of_member_in_good_standing') is-invalid @enderror">
                                    @error('list_of_member_in_good_standing')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Constitution and By-laws (PDF, 10MB)</label>
                                    <input type="file" name="constitution_and_by_laws"
                                        class="@error('constitution_and_by_laws') is-invalid @enderror">
                                    @error('constitution_and_by_laws')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Endorsement Certification from Proper Authority (PDF, 10MB)</label>
                                    <input type="file" name="endorsement_certification_from_proper_authority"
                                        class="@error('endorsement_certification_from_proper_authority') is-invalid @enderror">
                                    @error('endorsement_certification_from_proper_authority')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        @endorganization
                        <!-- Password Change -->
                        <div class="col-12">
                            <h4 class="mb-4 mt-4">Change Password</h4>
                        </div>

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="password">{{ __('New Password') }}</label>
                                <input type="password" @error('password') class="form-control is-invalid" @enderror
                                    name="password" id="password" placeholder="{{ __('New Password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label for="password_confirmation">{{ __('Confirm New Password') }}</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="{{ __('Confirm New Password') }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
