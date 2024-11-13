@extends('layouts.guest')

@section('content')
    <style>
        .requirement {
            margin: 4px 0;
            font-size: 0.875rem;
        }

        .text-danger {
            color: #dc3545;
        }

        .text-success {
            color: #198754;
        }

        .bgregister {
        background-image: url('{{ asset('images/background/colorful.png') }}');
        /* Set the background image path */

        background-size: cover;
        /* Ensures the image covers the entire section */
        background-position: center;
        /* Centers the image in the section */
        background-repeat: no-repeat;
        /* Prevents the image from repeating */
        /* Ensures the section takes up 100% of the viewport height */
        width: 100%;
        /* Ensures the section takes up 100% of the viewport width */
        position: relative;
        /* Allows for full positioning of any content inside */
    }
    </style>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card col-12 col-md-8 col-lg-6">
            <div class="signin-wrapper bgregister">
                <div class="form-wrapper ">
                    <div class="row">
                        <div class="col-2 mt-2">
                            <img src="{{ asset('images/logo/logo-ym.gif') }}" alt="" srcset=""
                                style="height: 110px; width:110px;">
                        </div>
                        <div class="col">
                            <h2 class="mb-15">
                                {{ __('WELCOME TO LOCALIZED YOUTH ORGANIZATION REGISTRATION PROGRAM - CALAMBA CITY') }}</h2>
                        </div>
                    </div>

                    <div class="mb-4 mt-3">
                        <p>Do you have an organization consisting of members ages 15-30 years old?
                            or are you a part of a youth-serving organization operating in the City of Calamba? </p>
                        <p> <br> Be part of the LYORP Calamba! </p>

                        <p class="text-bold"> <br>This form should be accomplished by the primary representative of your
                            organization. </p>

                        <p> <br> Please follow instructions for faster and smoother experience in registration. </p>

                        <p> <br> 1. <b>Download</b> the necessary attachments such as Registration Form, List of Officers
                            and Advisers and Members in Good standing thru the ff links:</p>

                        <p>
                            <a href="https://docs.google.com/document/d/1pcL2tc8W9OA_4nmRLCr97cJClkAdfnW-dQCpLfKHVNo/edit"><b>Registration
                                    form</b></a>
                        </p>

                        <p>
                            <a href="https://docs.google.com/document/d/1zbxNnWxhpdBySn13NIKqh5pR-LD96AuTfyTFxRFq-ts/edit"><b>Directory
                                    of officers and advisers</b>
                            </a>
                        </p>

                        <p>
                            <a
                                href="https://docs.google.com/spreadsheets/d/1vpVpFgV4qWhCW2iccTv-CPUEnlSEe0fgYA2r5M9ZGBE/edit#gid=1341368209">
                                <b>Members in Good Standing</b></a>
                        </p>

                        <p> <br> 2. Accomplish all forms and save as file (Preferably PDF file).</p>

                        <p> <br> 3. Attach necessary documents on the section below (Add File)</p>

                        <p> <br> 4. Once you have submitted your response, our team will contact you within 24 hours for
                            verification.</p>

                        <p> <br> 5. You will receive an invitation letter on your email after verification.</p>

                        <p> <br> Should you have any questions and clarifications, kindly contact us at
                            <a
                                href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCKCGldMrbLrkdhHjBNlckXHKvrDVcfRdtJhcxnsThjbQlBfpQzRwfMQmfxCdcPrVnjwHBKg">Lyorpcalamba.secretariat@gmail.com</a>
                            or <b>(045) 545 6783 (loc 8120)</b> and look for <b>Mr. Kenneth John H. Capunitan</b>
                        </p>
                    </div>

                    <hr>
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="input-style-1">
                                    <label for="name">{{ __('Name of Organization ') }} <span
                                            style="color: red;">*</span></label>
                                    <input type="text" @error('name') class="form-control is-invalid" @enderror
                                        name="name" id="name" placeholder="{{ __('Name of Organization') }}"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label for="email">{{ __('Email ') }}<span style="color: red;">*</span></label>
                                    <input @error('email') class="form-control is-invalid" @enderror type="email"
                                        name="email" id="email" placeholder="{{ __('Email') }}"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label
                                        for="name_of_the_primary_representative">{{ __('Name of the Primary Representative ( Surname, First Name, Middle Initial: eg Dela Cruz, Juan, D.) ') }}<span
                                            style="color: red;">*</span></label>
                                    <input type="text"
                                        @error('name_of_the_primary_representative') class="form-control is-invalid" @enderror
                                        name="name_of_the_primary_representative" id="name_of_the_primary_representative"
                                        placeholder="{{ __('Name of the Primary Representative') }}"
                                        value="{{ old('name_of_the_primary_representative') }}" required
                                        autocomplete="name_of_the_primary_representative" autofocus>
                                    @error('name_of_the_primary_representative')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="name">{{ __('Address') }} <span style="color: red;">*</span></label>
                                    <input type="text" @error('address') class="form-control is-invalid" @enderror
                                        name="address" id="address" placeholder="{{ __('Address') }}"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- end col -->

                            <div class="col-6">
                                <div class="input">
                                    <label for="sex">{{ __('Sex ') }}<span style="color: red;">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" id="sexMale"
                                            value="male">
                                        <label class="form-check-label" for="sexMale">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" id="sexFemale"
                                            value="female" checked>
                                        <label class="form-check-label" for="sexFemale">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" id="sexPreferNotToSay"
                                            value="other">
                                        <label class="form-check-label" for="sexPreferNotToSay">
                                            Prefer not to say
                                        </label>
                                    </div>
                                    @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="input-style-1">
                                    <label for="age">{{ __('Age ') }}<span style="color: red;">*</span></label>
                                    <input type="number" @error('age') class="form-control is-invalid" @enderror
                                        name="age" id="age" placeholder="{{ __('Age') }}"
                                        value="{{ old('age') }}" required autocomplete="age" autofocus>
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label for="phone_number">{{ __('Phone Number (Number must start with 0 and contain exactly 11 digits.)') }}<span
                                            style="color: red;">*</span></label>
                                    <input type="tel" @error('phone_number') class="form-control is-invalid" @enderror
                                        name="phone_number" id="phone_number" placeholder="{{ __('Phone Number') }}"
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus
                                        maxlength="11" pattern="^0\d{10}$"
                                        title="{{ __('Phone number must start with 0 and contain exactly 11 digits.') }}">
                            
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="col-6" style="margin-top: 20px">
                                <div class="input-style-1">
                                    <label for="facebook_url">{{ __('Facebook Url ') }}<span
                                            style="color: red;">*</span></label>
                                    <input type="url" @error('facebook_url') class="form-control is-invalid" @enderror
                                        name="facebook_url" id="facebook_url" placeholder="{{ __('Facebook Url') }}"
                                        value="{{ old('facebook_url') }}" required autocomplete="facebook_url">
                                    @error('facebook_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label
                                        for="duty_accomplished_registration_form">{{ __('Duly Accomplished Registration Form ') }}<span
                                            style="color: red;">*</span></label>
                                    <input type="file"
                                        @error('duty_accomplished_registration_form') class="form-control is-invalid" @enderror
                                        name="duty_accomplished_registration_form"
                                        id="duty_accomplished_registration_form"
                                        placeholder="{{ __('Duly Accomplished Registration Form') }}"
                                        value="{{ old('duty_accomplished_registration_form') }}" required
                                        autocomplete="duty_accomplished_registration_form" autofocus>
                                    @error('duty_accomplished_registration_form')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label
                                        for="list_of_officers_and_adviser">{{ __('List of Officers and Adviser ') }}<span
                                            style="color: red;">*</span></label>
                                    <input type="file"
                                        @error('list_of_officers_and_adviser') class="form-control is-invalid" @enderror
                                        name="list_of_officers_and_adviser" id="list_of_officers_and_adviser"
                                        placeholder="{{ __('List of Officers and Adviser') }}"
                                        value="{{ old('list_of_officers_and_adviser') }}" required
                                        autocomplete="list_of_officers_and_adviser" autofocus>
                                    @error('list_of_officers_and_adviser')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label
                                        for="list_of_member_in_good_standing">{{ __('List of member in good standing ') }}<span
                                            style="color: red;">*</span></label>
                                    <input type="file"
                                        @error('list_of_member_in_good_standing') class="form-control is-invalid" @enderror
                                        name="list_of_member_in_good_standing" id="list_of_member_in_good_standing"
                                        placeholder="{{ __('List of member in good standing') }}"
                                        value="{{ old('list_of_member_in_good_standing') }}" required
                                        autocomplete="list_of_member_in_good_standing" autofocus>
                                    @error('list_of_member_in_good_standing')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label
                                        for="constitution_and_by_laws">{{ __('Constitution and By- laws ( If available)') }}</label>
                                    <input type="file"
                                        @error('constitution_and_by_laws') class="form-control is-invalid" @enderror
                                        name="constitution_and_by_laws" id="constitution_and_by_laws"
                                        placeholder="{{ __('Constitution and By- laws') }}"
                                        value="{{ old('constitution_and_by_laws') }}" required
                                        autocomplete="constitution_and_by_laws" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label
                                        for="endorsement_certification_from_proper_authority">{{ __('Endorsement / Certification from proper authority ( Brgy Certificate/ School Certificate/ Certification for Pastor or Church) -  ( If Available)') }}</label>
                                    <input type="file"
                                        @error('endorsement_certification_from_proper_authority') class="form-control is-invalid" @enderror
                                        name="endorsement_certification_from_proper_authority"
                                        id="endorsement_certification_from_proper_authority"
                                        placeholder="{{ __('Endorsement / Certification from proper authority') }}"
                                        value="{{ old('endorsement_certification_from_proper_authority') }}" required
                                        autocomplete="endorsement_certification_from_proper_authority" autofocus>
                                    @error('endorsement_certification_from_proper_authority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- end col -->

                            <div class="col-6">
                                <div class="input-style-1">
                                    <label for="password">{{ __('Password ') }}<span style="color: red;">*</span></label>
                                    <div class="password-field position-relative">
                                        <input type="password"
                                            @error('password') class="form-control is-invalid" @enderror name="password"
                                            id="password" placeholder="{{ __('Password') }}" required
                                            autocomplete="new-password" onkeyup="validatePassword(this)">
                                        <i class="fa-solid fa-eye-slash toggle-password position-absolute"
                                            style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"
                                            onclick="togglePasswordVisibility('password', this)">
                                        </i>
                                    </div>
                                    <div id="password-requirements" class="mt-2 text-sm">
                                        <div id="length-check" class="requirement text-danger">
                                            <i class="fa-solid fa-circle-xmark"></i> At least 8 characters
                                        </div>
                                        <div id="uppercase-check" class="requirement text-danger">
                                            <i class="fa-solid fa-circle-xmark"></i> At least 1 uppercase letter
                                        </div>
                                        <div id="lowercase-check" class="requirement text-danger">
                                            <i class="fa-solid fa-circle-xmark"></i> At least 1 lowercase letter
                                        </div>
                                        <div id="number-check" class="requirement text-danger">
                                            <i class="fa-solid fa-circle-xmark"></i> At least 1 number
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-6">
                                <div class="input-style-1">
                                    <label for="password_confirmation">{{ __('Confirm Password ') }}<span
                                            style="color: red;">*</span></label>
                                    <div class="password-field position-relative">
                                        <input type="password"
                                            @error('password') class="form-control is-invalid" @enderror
                                            name="password_confirmation" id="password_confirmation"
                                            placeholder="{{ __('Confirm Password') }}" required
                                            autocomplete="new-password" onkeyup="validatePasswordMatch()">
                                        <i class="fa-solid fa-eye-slash toggle-password position-absolute"
                                            style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"
                                            onclick="togglePasswordVisibility('password_confirmation', this)">
                                        </i>
                                    </div>
                                    <div id="password-match" class="mt-2 text-sm text-danger">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-12">
                                <div class="button-group d-flex justify-content-center flex-wrap">
                                    <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <script>
        function togglePasswordVisibility(inputId, icon) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }

        function validatePassword(input) {
            const password = input.value;
            const requirements = {
                'length-check': password.length >= 8,
                'uppercase-check': /[A-Z]/.test(password),
                'lowercase-check': /[a-z]/.test(password),
                'number-check': /[0-9]/.test(password)
            };

            for (const [id, valid] of Object.entries(requirements)) {
                const element = document.getElementById(id);
                if (valid) {
                    element.classList.remove('text-danger');
                    element.classList.add('text-success');
                    element.querySelector('i').classList.remove('fa-circle-xmark');
                    element.querySelector('i').classList.add('fa-circle-check');
                } else {
                    element.classList.remove('text-success');
                    element.classList.add('text-danger');
                    element.querySelector('i').classList.remove('fa-circle-check');
                    element.querySelector('i').classList.add('fa-circle-xmark');
                }
            }

            validatePasswordMatch();
        }

        function validatePasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchElement = document.getElementById('password-match');

            if (confirmPassword === '') {
                matchElement.textContent = '';
            } else if (password === confirmPassword) {
                matchElement.classList.remove('text-danger');
                matchElement.classList.add('text-success');
                matchElement.innerHTML = '<i class="fa-solid fa-circle-check"></i> Passwords match';
            } else {
                matchElement.classList.remove('text-success');
                matchElement.classList.add('text-danger');
                matchElement.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> Passwords do not match';
            }
        }
    </script>
@endsection
