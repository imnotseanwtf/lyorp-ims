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

                    <input type="hidden" name="activity_request_id" id="edit_activity_request_id">

                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" class="form-control" name="name" id="edit_name"
                            placeholder="Enter name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="edit_age">Age</label>
                        <input type="number" class="form-control" name="age" id="edit_age" placeholder="Enter age"
                            value="{{ old('age') }}" required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="edit_gender">Gender</label>
                        <select name="gender" id="edit_gender" class="form-control" required>
                            <option value="" selected disabled>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="edit_barangay">Barangay</label>
                        <input type="text" class="form-control" name="barangay" id="edit_barangay"
                            placeholder="Enter barangay" value="{{ old('barangay') }}" required>
                        @error('barangay')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="edit_name_of_organization">Name of Organization</label>
                        <input type="text" class="form-control" name="name_of_organization"
                            id="edit_name_of_organization" placeholder="Enter Name of Organization"
                            value="{{ old('name_of_organization') }}">
                        @error('name_of_organization')
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
