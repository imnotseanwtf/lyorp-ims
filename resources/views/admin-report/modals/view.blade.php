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

                <div class="form-group" id="reason_form_group">
                    <label for="reason">{{ __('Reason') }}</label>
                    <div class="input-group">
                        <textarea name="reason" type="text" id="view_reason" @class(['form-control']) placeholder="{{ __('Reason') }}"
                            value="{{ old('reason') }}" readonly></textarea>
                    </div>
                </div>


                <div class="form-group mt-3">
                    <label for="title">{{ __('Title') }}</label>
                    <div class="input-group">
                        <input name="title" type="text" id="view_title" @class(['form-control'])
                            placeholder="{{ __('Title') }}" value="{{ old('title') }}" readonly>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="seminars_activities_conducted">{{ __('Seminars & Activities Conducted') }}</label>
                    <div class="input-group">
                        <input name="seminars_activities_conducted" type="text"
                            id="view_seminars_activities_conducted" class="form-control"
                            placeholder="{{ __('Seminars & Activities Conducted') }}" readonly>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="content">{{ __('Content') }}</label>
                    <div class="input-group">
                        <textarea name="content" id="view_content" @class(['form-control']) placeholder="{{ __('Content') }}" readonly>{{ old('content') }}</textarea>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="recruitment">{{ __('Recruitment') }}</label>
                    <div class="input-group">
                        <input name="recruitment" type="text" id="view_recruitment" class="form-control"
                            placeholder="{{ __('Recruitment') }}" readonly>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="others">{{ __('Others') }}</label>
                    <div class="input-group">
                        <input name="others" type="text" id="view_others" class="form-control"
                            placeholder="{{ __('Others') }}" readonly>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="view_file">{{ __('File') }}</label>
                    <div class="input-group">
                        <input name="file" type="text" id="view_file" class="form-control"
                            placeholder="{{ __('File') }}" readonly>
                        <a href="#" id="link_file" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="">View Participants</label>
                    <a class="btn btn-primary view-participants-btn"
                        data-route="{{ route('registered.index', ':id') }}" title="View Registered">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
