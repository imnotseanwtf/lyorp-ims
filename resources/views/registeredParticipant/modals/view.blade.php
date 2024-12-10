{{-- VIEW --}}

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="view_name">Name</label>
                    <input type="text" class="form-control" id="view_name" name="name" value="{{ old('name') }}" readonly>
                </div>

                <div class="form-group mt-3">
                    <label for="view_age">Age</label>
                    <input type="number" class="form-control" id="view_age" name="age" value="{{ old('age') }}" readonly>
                </div>

                <div class="form-group mt-3">
                    <label for="view_gender">Gender</label>
                    <input type="text" class="form-control" id="view_gender" name="gender" value="{{ old('gender') }}" readonly>
                </div>

                <div class="form-group mt-3">
                    <label for="view_barangay">Barangay</label>
                    <input type="text" class="form-control" id="view_barangay" name="barangay" value="{{ old('barangay') }}" readonly>
                </div>

                <div class="form-group mt-3">
                    <label for="view_name_of_organization">Name of Organization</label>
                    <input type="text" class="form-control" id="view_name_of_organization" name="name_of_organization"
                        value="{{ old('name_of_organization') }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
