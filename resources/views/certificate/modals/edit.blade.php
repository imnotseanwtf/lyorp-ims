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
            <form action="{{ route('updateCertificate') }}" method="POST" enctype="multipart/form-data"
                id="update-form">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group mt-3">
                        <label for="left_logo">Left Logo</label>
                        <input type="file" class="form-control" name="left_logo" accept="image/*">
                        <small class="form-text text-muted">If you don't want to change the current logo, leave this
                            field blank.</small>
                        @error('left_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="right_logo">Right Logo</label>
                        <input type="file" class="form-control" name="right_logo" accept="image/*">
                        <small class="form-text text-muted">If you don't want to change the current logo, leave this
                            field blank.</small>
                        @error('right_logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="left_signiture">Left Signature</label>
                        <input type="file" class="form-control" name="left_signiture"
                            placeholder="Enter Left Signature" value="{{ old('left_signiture') }}">
                        <small class="form-text text-muted">If you don't want to change the current signature, leave
                            this field blank.</small>
                        @error('left_signiture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="left_name">Left Name</label>
                        <input type="text" class="form-control" name="left_name" placeholder="Enter Left Name"
                            value="{{ old('left_name') }}">
                        <small class="form-text text-muted">If you don't want to change the current name, leave this
                            field blank.</small>
                        @error('left_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="middle_signiture">Middle Signature</label>
                        <input type="file" class="form-control" name="middle_signiture"
                            placeholder="Enter Middle Signature" value="{{ old('middle_signiture') }}">
                        <small class="form-text text-muted">If you don't want to change the current signature, leave
                            this field blank.</small>
                        @error('middle_signiture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name"
                            value="{{ old('middle_name') }}">
                        <small class="form-text text-muted">If you don't want to change the current name, leave this
                            field blank.</small>
                        @error('middle_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="right_signiture">Right Signature</label>
                        <input type="file" class="form-control" name="right_signiture"
                            placeholder="Enter Right Signature" value="{{ old('right_signiture') }}">
                        <small class="form-text text-muted">If you don't want to change the current signature, leave
                            this field blank.</small>
                        @error('right_signiture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="right_name">Right Name</label>
                        <input type="text" class="form-control" name="right_name" placeholder="Enter Right Name"
                            value="{{ old('right_name') }}">
                        <small class="form-text text-muted">If you don't want to change the current name, leave this
                            field blank.</small>
                        @error('right_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
