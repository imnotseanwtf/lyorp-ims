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
                        <label for="progress_update">Progress Update</label>
                        <input type="text" class="form-control" name="progress_update"
                            placeholder="Enter Progress Update" value="{{ old('progress_update') }}" id="edit_progress_update">
                        @error('progress_update')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">File (Pdf ) (10mb)</label>
                        <input type="file" class="form-control" name="file" id="edit_file"
                            onchange="validateEditFile(this)">
                        <div id="editFileError" class="invalid-feedback" style="display:none"></div>
                        @error('file')
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

<script>
    function validateEditFile(input) {
        const file = input.files[0];
        const fileError = document.getElementById('editFileError');
        const submitBtn = document.getElementById('editSubmitBtn');

        // Reset
        input.classList.remove('is-invalid');
        fileError.style.display = 'none';
        submitBtn.disabled = false;

        if (!file) return; // Allow empty file for edit

        // Validate file type
        if (file.type !== 'application/pdf') {
            input.classList.add('is-invalid');
            fileError.textContent = 'Only PDF files are allowed';
            fileError.style.display = 'block';
            submitBtn.disabled = true;
            return false;
        }

        // Validate file size (10MB = 10 * 1024 * 1024 bytes)
        if (file.size > 10 * 1024 * 1024) {
            input.classList.add('is-invalid');
            fileError.textContent = 'File size must not exceed 10MB';
            fileError.style.display = 'block';
            submitBtn.disabled = true;
            return false;
        }
    }
</script>
