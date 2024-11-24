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
                        <label for="question">Question</label>
                        <input type="text" class="form-control" name="question" placeholder="Enter Question"
                            value="{{ old('question') }}" id="edit_question">
                        @error('question')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Select Answer Type</label>
                        <select name="answer_type" required class="form-control">
                            <option value="" selected disabled>Select</option>
                            <option value="yesOrNo">Yes Or No</option>
                            <option value="likertScales">Likert Scales</option>
                            <option value="ratingLegends">Rating Legends</option>
                            <option value="input">Input</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
