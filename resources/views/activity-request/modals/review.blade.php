{{-- VIEW --}}
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Reason</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="reason">{{ __('Reason') }}</label>
                    <div class="input-group">
                        <textarea name="reason" type="reason" id="view-reason" @class(['form-control'])
                            placeholder="{{ __('Reason') }}" value="{{ old('reason') }}" readonly></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
