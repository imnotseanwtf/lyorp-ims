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
                    <label for="question">{{ __('Question') }}</label>
                    <div class="input-group">
                        <input name="question" type="text" id="view_question" @class(['form-control'])
                            placeholder="{{ __('Question') }}" value="{{ old('question') }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
