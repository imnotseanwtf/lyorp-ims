{{-- VIEW --}}
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Activity</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- Part 1: General Information -->
                <h3>General Information</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="view_activity_name">Activity Name</label>
                            <input type="text" class="form-control" id="view_activity_name" placeholder="Activity Name" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="view_date">Date</label>
                            <input type="text" class="form-control" id="view_date" placeholder="Date" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="view_venue">Venue</label>
                            <input type="text" class="form-control" id="view_venue" placeholder="Venue" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="view_time">Time</label>
                            <input type="text" class="form-control" id="view_time" placeholder="Time" readonly>
                        </div>
                    </div>
                </div>

                <!-- Part 2: Topics -->
                <h3 class="mt-2">Topics to be Discussed</h3>
                <div class="form-group">
                    <label>Topics</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Financial management" id="view_topic_financial_management" disabled>
                        <label class="form-check-label" for="view_topic_financial_management">Financial management</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="RA 8044" id="view_topic_ra8044" disabled>
                        <label class="form-check-label" for="view_topic_ra8044">RA 8044</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="RA 10742" id="view_topic_ra10742" disabled>
                        <label class="form-check-label" for="view_topic_ra10742">RA 10742</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="SK" id="view_topic_sk" disabled>
                        <label class="form-check-label" for="view_topic_sk">SK</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="LYDO" id="view_topic_lydo" disabled>
                        <label class="form-check-label" for="view_topic_lydo">LYDO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="LYDC" id="view_topic_lydc" disabled>
                        <label class="form-check-label" for="view_topic_lydc">LYDC</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="YORP" id="view_topic_yorp" disabled>
                        <label class="form-check-label" for="view_topic_yorp">YORP</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="ASRH" id="view_topic_asrh" disabled>
                        <label class="form-check-label" for="view_topic_asrh">ASRH</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="view_specific_objectives">Specific Objectives of the Discussion of NYC</label>
                            <textarea class="form-control" id="view_specific_objectives" placeholder="Specific Objectives" readonly></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="view_specific_outputs">Specific Outputs of the Discussion of NYC</label>
                            <textarea class="form-control" id="view_specific_outputs" placeholder="Specific Outputs" readonly></textarea>
                        </div>
                    </div>
                </div>

                <!-- Part 4: Equipment Available -->
                <h3 class="mt-2">Equipment Available</h3>
                <div class="form-group">
                    <label>Equipment</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Projector" id="view_equipment_projector" disabled>
                        <label class="form-check-label" for="view_equipment_projector">Projector</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Speaker" id="view_equipment_speaker" disabled>
                        <label class="form-check-label" for="view_equipment_speaker">Speaker</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Microphone" id="view_equipment_microphone" disabled>
                        <label class="form-check-label" for="view_equipment_microphone">Microphone</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Clicker" id="view_equipment_clicker" disabled>
                        <label class="form-check-label" for="view_equipment_clicker">Clicker</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Podium" id="view_equipment_podium" disabled>
                        <label class="form-check-label" for="view_equipment_podium">Podium</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="LED Screen" id="view_equipment_led_screen" disabled>
                        <label class="form-check-label" for="view_equipment_led_screen">LED Screen</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Video conference application" id="view_equipment_video_conference" disabled>
                        <label class="form-check-label" for="view_equipment_video_conference">If webinar, video conference application</label>
                    </div>
                </div>

                <!-- File Download -->
                <div class="form-group">
                    <label for="view_file">Name with signature of representative of organization (Pdf File)  + Date Signed</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="view_file" placeholder="File" readonly>
                        <a href="#" id="link_file" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
