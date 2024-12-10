{{-- EDIT --}}

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>

                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" id="update-form">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <div class="input-style-1">
                            <label for="password">{{ __('Password ') }}<span style="color: red;">*</span></label>
                            <div class="password-field position-relative">
                                <input type="password" @error('password') class="form-control is-invalid" @enderror
                                    name="password" id="password" placeholder="{{ __('Password') }}" required
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
                    <div class="form-group">
                        <div class="input-style-1">
                            <label for="password_confirmation">{{ __('Confirm Password ') }}<span
                                    style="color: red;">*</span></label>
                            <div class="password-field position-relative">
                                <input type="password" @error('password') class="form-control is-invalid" @enderror
                                    name="password_confirmation" id="password_confirmation"
                                    placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password"
                                    onkeyup="validatePasswordMatch()">
                                <i class="fa-solid fa-eye-slash toggle-password position-absolute"
                                    style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"
                                    onclick="togglePasswordVisibility('password_confirmation', this)">
                                </i>
                            </div>
                            <div id="password-match" class="mt-2 text-sm text-danger">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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
