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
                    <label for="name">{{ __('Name') }}</label>
                    <div class="input-group">
                        <input name="name" type="text" id="view_name" @class(['form-control'])
                            placeholder="{{ __('Name') }}" value="{{ old('name') }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="view_file">{{ __('File') }}</label>
                    <div class="input-group">
                        <input name="file" type="text" id="view_file" class="form-control"
                            placeholder="{{ __('File') }}" readonly>
                        <a href="#" id="link_file" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
