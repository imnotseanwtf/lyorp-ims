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
                        <label for="seminars_activities_conducted">{{ __('Seminars & Activities Conducted') }}</label>
                        <input type="text" class="form-control" name="seminars_activities_conducted" 
                            placeholder="{{ __('Seminars & Activities Conducted') }}" 
                            value="{{ old('seminars_activities_conducted') }}" id="edit_seminars_activities_conducted">
                        @error('seminars_activities_conducted')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="seminars_activities_attended">{{ __('Seminars & Activities Attended') }}</label>
                        <input type="text" class="form-control" name="seminars_activities_attended" 
                            placeholder="{{ __('Seminars & Activities Attended') }}" 
                            value="{{ old('seminars_activities_attended') }}" id="edit_seminars_activities_attended">
                        @error('seminars_activities_attended')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="recruitment">{{ __('Recruitment') }}</label>
                        <input type="text" class="form-control" name="recruitment" 
                            placeholder="{{ __('Recruitment') }}" 
                            value="{{ old('recruitment') }}" id="edit_recruitment">
                        @error('recruitment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meeting_conducted">{{ __('Meeting Conducted') }}</label>
                        <input type="text" class="form-control" name="meeting_conducted" 
                            placeholder="{{ __('Meeting Conducted') }}" 
                            value="{{ old('meeting_conducted') }}" id="edit_meeting_conducted">
                        @error('meeting_conducted')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="others">{{ __('Others') }}</label>
                        <input type="text" class="form-control" name="others" 
                            placeholder="{{ __('Others') }}" 
                            value="{{ old('others') }}" id="edit_others">
                        @error('others')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title"
                            value="{{ old('title') }}" id="edit_title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" placeholder="Enter content" id="edit_content">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" class="form-control" name="file" id="edit_file">
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
