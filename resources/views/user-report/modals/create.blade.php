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
            <form action="{{ route('user-report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    {{-- Seminars & Activities Attended --}}
                    <div class="form-group">
                        <label for="seminars_and_activities_attended">Seminars & Activities Attended</label>
                        <input type="number" class="form-control" name="seminars_and_activities_attended"
                            value="{{ old('seminars_and_activities_attended') }}" required>
                        @error('seminars_&_activities_attended')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Recruitment --}}
                    <div class="form-group">
                        <label for="recruitment">Recruitment</label>
                        <input type="number" class="form-control" name="recruitment" value="{{ old('recruitment') }}"
                            required>
                        @error('recruitment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Meetings Conducted --}}
                    <div class="form-group">
                        <label for="meeting_conducted">Meetings Conducted</label>
                        <input type="number" class="form-control" name="meeting_conducted"
                            value="{{ old('meeting_conducted') }}" required>
                        @error('meeting_conducted')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Others --}}
                    <div class="form-group">
                        <label for="others">Others</label>
                        <input type="text" class="form-control" name="others" value="{{ old('others') }}"
                            placeholder="Any other information">
                        @error('others')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Title</label>
                        <select name="title" class="form-control" required>
                            <option value="" selected disabled>Select Activity</option>
                            @foreach($activity_request as $activity)
                                <option value="{{ $activity->activity_name }}">{{ $activity->activity_name }}</option>
                            @endforeach
                        </select>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Content Input --}}
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" placeholder="Enter content" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- File Input --}}
                    <div class="form-group">
                        <label for="file">File (Pdf ) (10mb)</label>
                        <input type="file" class="form-control" name="file" required>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <input type="hidden" value="{{ $folder_id }}" name="folder_id">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
