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
            <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title"
                            value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" placeholder="Enter description"
                            value="{{ old('description') }}" required></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="announce_in">Announce In</label>
                        <input type="date" class="form-control" name="announce_on" placeholder="Enter Announce In"
                            value="{{ old('announce_on') }}" min="{{ date('Y-m-d') }}" required>
                        @error('announce_in')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="end_on">End In</label>
                        <input type="date" class="form-control" name="end_on" placeholder="Enter End In"
                            value="{{ old('end_on') }}" min="{{ date('Y-m-d') }}" required>
                        @error('end_on')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter description"
                            value="{{ old('image') }}" accept="image/*" required>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Accepted formats: jpg, png, gif. Max size: 2MB.</small>
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
    document.getElementById('image').addEventListener('change', function() {
        const file = this.files[0];
        const errorMessage = document.querySelector('.invalid-feedback');

        if (file) {
            const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                errorMessage.textContent = 'Invalid file type. Please upload a jpg, png, or gif image.';
                errorMessage.style.display = 'block';
                this.classList.add('is-invalid');
                this.value = ''; // Clear the input
            } else {
                errorMessage.style.display = 'none';
                this.classList.remove('is-invalid');
            }
        }
    });
</script>
