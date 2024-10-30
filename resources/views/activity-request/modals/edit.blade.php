{{-- EDIT --}}

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Activity Request</h5>

                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form id="update-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <!-- Part 1: General Information -->
                    <h3>General Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_activity_name">Activity Name</label>
                                <input type="text" class="form-control" id="edit_activity_name" name="activity_name"
                                    placeholder="Enter activity name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_date">Date</label>
                                <input type="date" class="form-control" id="edit_date" name="date" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_venue">Venue</label>
                                <input type="text" class="form-control" id="edit_venue" name="venue"
                                    placeholder="Enter venue" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_time">Time</label>
                                <input type="time" class="form-control" id="edit_time" name="time" required>
                            </div>
                        </div>
                    </div>

                    <!-- Part 2: Topics -->
                    <h3 class="mt-2">Topics to be Discussed</h3>
                    <div class="form-group">
                        <label>Select Topics</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_topic_financial_management" name="topics[]" value="Financial management">
                            <label class="form-check-label" for="edit_topic_financial_management">Financial management</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_topic_ra8044" name="topics[]" value="RA 8044">
                            <label class="form-check-label" for="edit_topic_ra8044">RA 8044</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_topic_ra10742" name="topics[]" value="RA 10742">
                            <label class="form-check-label" for="edit_topic_ra10742">RA 10742</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_topic_sk" name="topics[]" value="SK">
                            <label class="form-check-label" for="edit_topic_sk">SK</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_topic_lydo" name="topics[]" value="LYDO">
                            <label class="form-check-label" for="edit_topic_lydo">LYDO</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_topic_lydc" name="topics[]" value="LYDC">
                            <label class="form-check-label" for="edit_topic_lydc">LYDC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_topic_yorp" name="topics[]" value="YORP">
                            <label class="form-check-label" for="edit_topic_yorp">YORP</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_topic_asrh" name="topics[]" value="ASRH">
                            <label class="form-check-label" for="edit_topic_asrh">ASRH</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_specific_objectives">Specific Objectives of the Discussion of NYC</label>
                                <textarea class="form-control" id="edit_specific_objectives" name="specific_objectives" placeholder="Enter specific objectives" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_specific_outputs">Specific Outputs of the Discussion of NYC</label>
                                <textarea class="form-control" id="edit_specific_outputs" name="specific_outputs" placeholder="Enter specific outputs" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Part 4: Equipment Available -->
                    <h3 class="mt-2">Equipment Available</h3>
                    <div class="form-group">
                        <label>Check Equipment Available at the Activity Venue</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_equipment_projector" name="equipment[]" value="Projector">
                            <label class="form-check-label" for="edit_equipment_projector">Projector</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_equipment_speaker" name="equipment[]" value="Speaker">
                            <label class="form-check-label" for="edit_equipment_speaker">Speaker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_equipment_microphone" name="equipment[]" value="Microphone">
                            <label class="form-check-label" for="edit_equipment_microphone">Microphone</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_equipment_clicker" name="equipment[]" value="Clicker">
                            <label class="form-check-label" for="edit_equipment_clicker">Clicker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_equipment_podium" name="equipment[]" value="Podium">
                            <label class="form-check-label" for="edit_equipment_podium">Podium</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_equipment_led_screen" name="equipment[]" value="LED Screen">
                            <label class="form-check-label" for="edit_equipment_led_screen">LED Screen</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_equipment_video_conference" name="equipment[]" value="Video conference application">
                            <label class="form-check-label" for="edit_equipment_video_conference">If webinar, video conference application</label>
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div class="form-group">
                        <label for="edit_file">Name with signature of representative of organization (Pdf File) + Date Signed</label>
                        <input type="file" class="form-control" id="edit_file" name="file">
                        <small class="form-text text-muted">Leave blank if you don't want to change the existing file.</small>
                    </div>
                    <div class="form-group" id="edit_file_existing"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
