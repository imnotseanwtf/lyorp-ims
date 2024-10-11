{{-- VIEW --}}

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <div class="input-group">
                        <input name="title" type="text" id="view_title" @class(['form-control'])
                            placeholder="{{ __('Title') }}" value="{{ old('title') }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <div class="input-group">
                        <textarea name="description" type="text" id="view_description" @class(['form-control'])
                            placeholder="{{ __('Description') }}" value="{{ old('description') }}" readonly></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
