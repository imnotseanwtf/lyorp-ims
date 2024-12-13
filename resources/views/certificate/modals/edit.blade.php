<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form action="{{ route('updateCertificate') }}" method="POST" enctype="multipart/form-data" id="update-form">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="left_logo">Left Logo</label>
                        <input type="file" class="form-control" id="left_logo" name="left_logo" accept="image/png,image/jpeg" onchange="validateFile(this)">
                        <small class="form-text text-muted">If you don't want to change the current logo, leave this field blank.</small>
                        <div class="invalid-feedback" id="left_logo_error"></div>
                        @error('left_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="right_logo">Right Logo</label>
                        <input type="file" class="form-control" id="right_logo" name="right_logo" accept="image/png,image/jpeg" onchange="validateFile(this)">
                        <small class="form-text text-muted">If you don't want to change the current logo, leave this field blank.</small>
                        <div class="invalid-feedback" id="right_logo_error"></div>
                        @error('right_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submitBtn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function validateFile(input) {
    // Get the file and error element
    const file = input.files[0];
    const errorElement = document.getElementById(`${input.id}_error`);
    const submitBtn = document.getElementById('submitBtn');
    
    // Reset validation state
    input.classList.remove('is-invalid');
    errorElement.style.display = 'none';
    
    // If no file selected, return (allows clearing the input)
    if (!file) {
        return true;
    }
    
    // Check if file is actually an image
    if (!file.type.startsWith('image/')) {
        showError(input, errorElement, 'Please select an image file.');
        return false;
    }
    
    // Check for specific image types
    if (!['image/png', 'image/jpeg', 'image/jpg'].includes(file.type)) {
        showError(input, errorElement, 'Only PNG and JPG files are allowed.');
        return false;
    }
    
    // Optional: Check file size (e.g., 5MB limit)
    const maxSize = 5 * 1024 * 1024; // 5MB in bytes
    if (file.size > maxSize) {
        showError(input, errorElement, 'File size must be less than 5MB.');
        return false;
    }
    
    return true;
}

function showError(input, errorElement, message) {
    // Clear the file input
    input.value = '';
    
    // Show error message
    input.classList.add('is-invalid');
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}

// Add form submit validation
document.getElementById('update-form').addEventListener('submit', function(event) {
    const leftLogo = document.getElementById('left_logo');
    const rightLogo = document.getElementById('right_logo');
    
    // Validate both inputs if they have files
    if (leftLogo.files.length && !validateFile(leftLogo)) {
        event.preventDefault();
        return false;
    }
    
    if (rightLogo.files.length && !validateFile(rightLogo)) {
        event.preventDefault();
        return false;
    }
});
</script>