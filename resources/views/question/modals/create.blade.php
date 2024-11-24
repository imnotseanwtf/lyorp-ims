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
            <form action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <input type="number" class="d-none" value="{{ $criteriaId }}" name="criteria_id">

                    <div class="form-group">
                        <label for="question">Question</label>
                        <textarea type="text" class="form-control" name="question" placeholder="Enter Question" value="{{ old('question') }}"
                            required></textarea>
                        @error('question')
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
