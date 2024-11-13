@extends('layouts.guest')

@section('content')
    <style>
        .bglogin {
            background-image: url('{{ asset('images/background/colorful.png') }}');
            /* Set the background image path */

            background-size: cover;
            /* Ensures the image covers the entire section */
            background-position: center;
            /* Centers the image in the section */
            background-repeat: no-repeat;
            /* Prevents the image from repeating */
            height: 100vh;
            /* Ensures the section takes up 100% of the viewport height */
            width: 100%;
            /* Ensures the section takes up 100% of the viewport width */

            position: relative;
            /* Allows for full positioning of any content inside */
        }
    </style>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 ">
        <div class="card col-12 col-md-8 col-lg-6">
            <div class="signin-wrapper bglogin">
                <div class="form-wrapper ">
                    <div class="text-center">
                        <img src="{{ asset('images/logo/logo-ym.gif') }}" alt="" style="height: 150px; width: 150px;"
                            class="mt-2">
                        <h2 class="mb-3">{{ __('Localized Youth Organization Registration Program') }}</h2>
                        <h4 class="mb-3">{{ __('Login') }}</h4>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input @error('email') class="form-control is-invalid" @enderror type="email"
                                        name="email" id="email" placeholder="{{ __('Email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" @error('password') class="form-control is-invalid" @enderror
                                        name="password" id="password" placeholder="{{ __('Password') }}" required
                                        autocomplete="current-password">
                                    <i class="fa-solid fa-eye-slash toggle-password position-absolute"
                                        style="right: 10px; top: 70%; transform: translateY(-50%); cursor: pointer;"
                                        onclick="togglePasswordVisibility('password', this)">
                                    </i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-xxl-6 col-lg-12 col-md-6">
                                <div class="form-check checkbox-style mb-30">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        value="" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <!-- end col -->
                            @if (Route::has('password.request'))
                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                    <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    </div>
                                </div>
                            @endif
                            <!-- end col -->
                            <div class="col-12">
                                <div class="button-group d-flex justify-content-center flex-wrap">
                                    <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            @if (Route::has('register'))
                                <div class="col-12 mt-3">
                                    <hr>
                                    <div class="button-group d-flex justify-content-center flex-wrap">
                                        <a href="{{ route('register') }}"
                                            class="main-btn success-btn btn-hover w-100 text-center">{{ __('Create New Account') }}</a>
                                    </div>
                                </div>
                            @endif
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
    </script>
@endsection
