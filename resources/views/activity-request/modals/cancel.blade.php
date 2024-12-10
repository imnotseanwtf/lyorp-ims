{{-- cancel --}}

<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelPromoModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" id="cancel-form">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-2">Are you sure you want to cancel this?</div>

                    <div class="form-group mt-3">
                        <label for="reason">Reason</label>
                        <textarea type="text" class="form-control" name="reason" placeholder="Enter Reason"
                            value="{{ old('reason') }}" required></textarea>
                        @error('reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer mt-2">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
