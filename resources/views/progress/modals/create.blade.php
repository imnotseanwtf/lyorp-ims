{{-- CREATE --}}

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create</h5>

                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form action="{{ route('progress.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $activity->id }}" name="activity_request_id">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title"
                            placeholder="Enter Title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="progress_update">Progress Update</label>
                        <input type="text" class="form-control" name="progress_update"
                            placeholder="Enter Progress Update" value="{{ old('progress_update') }}" required>
                        @error('progress_update')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">File (Pdf ) (10mb)</label>
                        <input type="file" class="form-control" name="file" id="file" required
                            onchange="validateFiles(this)">
                        <div id="fileError" class="invalid-feedback" style="display:none"></div>
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
    function validateFiles(input) {
        if (!input.files || !input.files[0]) {
            return true;
        }

        const file = input.files[0];
        const fileError = document.getElementById('fileError');
        const submitBtn = document.getElementById('submitBtn');

        // Reset validation state
        input.classList.remove('is-invalid');
        fileError.style.display = 'none';
        submitBtn.disabled = false;

        // Check if file is PDF
        if (file.type !== 'application/pdf') {
            // Clear the file input
            input.value = '';

            // Show error
            input.classList.add('is-invalid');
            fileError.textContent = 'Only PDF files are allowed';
            fileError.style.display = 'block';
            submitBtn.disabled = true;
            return false;
        }

        return true;
    }
</script>
