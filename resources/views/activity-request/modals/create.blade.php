{{-- CREATE --}}

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create</h5>

                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form action="{{ route('activity-request.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <!-- Part 1: General Information -->
                    <h3>General Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="activity_name">Activity Name</label>
                                <input type="text" class="form-control" name="activity_name"
                                    placeholder="Enter activity name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="venue">Venue</label>
                                <input type="text" class="form-control" name="venue" placeholder="Enter venue"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" name="time" required>
                            </div>
                        </div>
                    </div>

                    <!-- Part 2: Topics -->
                    <h3 class="mt-2">Topics to be Discussed</h3>
                    <div class="form-group">
                        <label>Select Topics</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Financial management">
                            <label class="form-check-label">Financial management</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="RA 8044">
                            <label class="form-check-label">RA 8044</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="RA 10742">
                            <label class="form-check-label">RA 10742</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="SK">
                            <label class="form-check-label">SK</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="LYDO">
                            <label class="form-check-label">LYDO</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="LYDC">
                            <label class="form-check-label">LYDC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="YORP">
                            <label class="form-check-label">YORP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="ASRH">
                            <label class="form-check-label">ASRH</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specific_objectives">Specific Objectives of the Discussion of NYC</label>
                                <textarea class="form-control" name="specific_objectives" placeholder="Enter specific objectives" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specific_outputs">Specific Outputs of the Discussion of NYC</label>
                                <textarea class="form-control" name="specific_outputs" placeholder="Enter specific outputs" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Part 4: Equipment Available -->
                    <h3 class="mt-2">Equipment Available</h3>
                    <div class="form-group">
                        <label>Check Equipment Available at the Activity Venue</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="equipment[]" value="Projector">
                            <label class="form-check-label">Projector</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="equipment[]" value="Speaker">
                            <label class="form-check-label">Speaker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="equipment[]" value="Microphone">
                            <label class="form-check-label">Microphone</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="equipment[]" value="Clicker">
                            <label class="form-check-label">Clicker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="equipment[]" value="Podium">
                            <label class="form-check-label">Podium</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="equipment[]" value="LED Screen">
                            <label class="form-check-label">LED Screen</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="equipment[]"
                                value="Video conference application">
                            <label class="form-check-label">If webinar, video conference application</label>
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div class="form-group">
                        <label for="file">Name with signature of representative of organization (Pdf File)  + Date Signed</label>
                        <input type="file" class="form-control" name="file" required>
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
