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
            <form action="{{ route('user-report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Activity Title</label>
                        <select name="activity_request_id" class="form-control" required>
                            <option value="" selected disabled>Select Activity</option>
                            @foreach($activity_request as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->activity_name }}</option>
                            @endforeach
                        </select>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Recruitment --}}
                    <div class="form-group">
                        <label for="recruitment">Recruitment</label>
                        <input type="number" class="form-control" name="recruitment" value="{{ old('recruitment') }}"
                            required>
                        @error('recruitment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                     {{-- Content Input --}}
                     <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" placeholder="Enter content" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                  
                    <div class="form-group">
                        <label for="file">File (Pdf ) (10mb)</label>
                        <input type="file" class="form-control" name="file" id="file" required onchange="validateFile(this)">
                        <div id="fileError" class="invalid-feedback" style="display:none"></div>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <input type="hidden" value="{{ $folder_id }}" name="folder_id">

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
    const file = input.files[0];
    const fileError = document.getElementById('fileError');
    const submitBtn = document.getElementById('submitBtn');
    
    // Reset
    input.classList.remove('is-invalid');
    fileError.style.display = 'none';
    submitBtn.disabled = false;

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
        fileError.textContent = 'File size must be less than 10MB';
        fileError.style.display = 'block';
        submitBtn.disabled = true;
        return false;
    }

    return true;
}
</script>
