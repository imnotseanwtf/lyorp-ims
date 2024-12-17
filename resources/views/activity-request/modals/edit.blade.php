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
                    <h3>General Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_activity_name">Activity Name</label>
                                <input type="text" class="form-control" name="activity_name" id="edit_activity_name"
                                    placeholder="Activity Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_date">Date</label>
                                <input type="date" class="form-control" name="date" id="edit_date"
                                    placeholder="Date" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_venue">Venue</label>
                                <input type="text" class="form-control" name="venue" id="edit_venue"
                                    placeholder="Venue" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_time">Time</label>
                                <input type="time" class="form-control" name="time" id="edit_time"
                                    placeholder="Time" required>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-2">Target Audience</h3>
                    <div class="form-group">
                        <label>Select Audience <span class="text-danger">*</span></label> <br>
                        <button type="button" id="edit-select-all-audience" class="btn btn-primary btn-sm">Select
                            All</button>
                        <button type="button" id="edit-deselect-all-audience" class="btn btn-secondary btn-sm">Deselect
                            All</button>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]"
                                value="Sangguniang Kabataan" id="edit_audience_sangguniang_kabataan">
                            <label class="form-check-label" for="edit_audience_sangguniang_kabataan">Sangguniang
                                Kabataan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]"
                                value="Youth Organization / Local Youth Development Council Member"
                                id="edit_audience_youth_organization">
                            <label class="form-check-label" for="edit_audience_youth_organization">Youth Organization /
                                Local Youth Development Council Member</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]"
                                value="Local Youth Development Officers"
                                id="edit_audience_local_youth_development_officers">
                            <label class="form-check-label" for="edit_audience_local_youth_development_officers">Local
                                Youth Development Officers</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]" value="Students"
                                id="edit_audience_students">
                            <label class="form-check-label" for="edit_audience_students">Students</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]" value="OSYs"
                                id="edit_audience_osys">
                            <label class="form-check-label" for="edit_audience_osys">OSYs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]"
                                value="NGOs" id="edit_audience_ngos">
                            <label class="form-check-label" for="edit_audience_ngos">NGOs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]"
                                value="Regional Line Agencies" id="edit_audience_regional_line_agencies">
                            <label class="form-check-label" for="edit_audience_regional_line_agencies">Regional Line
                                Agencies</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]"
                                value="LGU Employees" id="edit_audience_lgu_employees">
                            <label class="form-check-label" for="edit_audience_lgu_employees">LGU Employees</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input audience" type="checkbox" name="audience[]"
                                value="General Public" id="edit_audience_general_public">
                            <label class="form-check-label" for="edit_audience_general_public">General Public</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_others">Others</label>
                                <textarea class="form-control" name="others" id="edit_others_audience" placeholder="Enter Others"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_expected_number_of_participants">Expected Number of
                                    Participants</label>
                                <input type="number" class="form-control" name="expected_number_of_participants"
                                    id="edit_expected_number_of_participants"
                                    placeholder="Expected Number of Participants" required>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-2">Topics to be Discussed</h3>
                    <div class="form-group">
                        <label>Select Topics <span class="text-danger">*</span></label><br>
                        <button type="button" id="edit-select-all-topics" class="btn btn-primary btn-sm">Select
                            All</button>
                        <button type="button" id="edit-deselect-all-topics"
                            class="btn btn-secondary btn-sm">Deselect
                            All</button>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" name="topics[]"
                                value="Leadership" id="edit_topic_leadership">
                            <label class="form-check-label" for="edit_topic_leadership">Leadership</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Resource mobilization"
                                name="topics[]" id="edit_topic_resource_mobilization">
                            <label class="form-check-label" for="edit_topic_resource_mobilization">Resource
                                mobilization</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Legislative advocacy"
                                name="topics[]" id="edit_topic_legislative_advocacy">
                            <label class="form-check-label" for="edit_topic_legislative_advocacy">Legislative
                                advocacy</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Government procurement"
                                name="topics[]" id="edit_topic_government_procurement">
                            <label class="form-check-label" for="edit_topic_government_procurement">Government
                                procurement</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Budgeting"
                                name="topics[]" id="edit_topic_budgeting">
                            <label class="form-check-label" for="edit_topic_budgeting">Budgeting</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Disaster risk response"
                                name="topics[]" id="edit_topic_disaster_risk_response">
                            <label class="form-check-label" for="edit_topic_disaster_risk_response">Disaster risk
                                response</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Proposal Making"
                                name="topics[]" id="edit_topic_proposal_making">
                            <label class="form-check-label" for="edit_topic_proposal_making">Proposal Making</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" name="topics[]"
                                value="Code of conduct and ethical standards" id="edit_topic_code_of_conduct">
                            <label class="form-check-label" for="edit_topic_code_of_conduct">Code of conduct and
                                ethical standards</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Team building"
                                name="topics[]" id="edit_topic_team_building">
                            <label class="form-check-label" for="edit_topic_team_building">Team building</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Planning" name="topics[]"
                                id="edit_topic_planning">
                            <label class="form-check-label" for="edit_topic_planning">Planning</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Public speaking"
                                name="topics[]" id="edit_topic_public_speaking">
                            <label class="form-check-label" for="edit_topic_public_speaking">Public speaking</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Gender and development"
                                name="topics[]" id="edit_topic_gender_and_development">
                            <label class="form-check-label" for="edit_topic_gender_and_development">Gender and
                                development</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Environment protection"
                                name="topics[]" id="edit_topic_environment_protection">
                            <label class="form-check-label" for="edit_topic_environment_protection">Environment
                                protection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Ordinance writing"
                                name="topics[]" id="edit_topic_ordinance_writing">
                            <label class="form-check-label" for="edit_topic_ordinance_writing">Ordinance
                                writing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Situational Analysis"
                                name="topics[]" id="edit_topic_situational_analysis">
                            <label class="form-check-label" for="edit_topic_situational_analysis">Situational
                                Analysis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Monitoring and evaluation"
                                name="topics[]" id="edit_topic_monitoring_and_evaluation">
                            <label class="form-check-label" for="edit_topic_monitoring_and_evaluation">Monitoring and
                                evaluation</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="Financial management"
                                name="topics[]" id="edit_topic_financial_management">
                            <label class="form-check-label" for="edit_topic_financial_management">Financial
                                management</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="RA 8044" name="topics[]"
                                id="edit_topic_ra8044">
                            <label class="form-check-label" for="edit_topic_ra_8044">RA 8044 (Youth in Nation-Building
                                Act)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="RA 10742" name="topics[]"
                                id="edit_topic_ra10742">
                            <label class="form-check-label" for="edit_topic_ra_10742">RA 10742 (Sangguniang Kabataan
                                Reform Act of 2015)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="SK" name="topics[]"
                                id="edit_topic_sk">
                            <label class="form-check-label" for="edit_topic_sk">SK (Sangguniang Kabataan)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="LYDO" name="topics[]"
                                id="edit_topic_lydo">
                            <label class="form-check-label" for="edit_topic_lydo">LYDO (Local Youth Devt
                                Office)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="LYDC" name="topics[]"
                                id="edit_topic_lydc">
                            <label class="form-check-label" for="edit_topic_lydc">LYDC (Local Youth Devt
                                Council)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input discuss" type="checkbox" value="YORP" name="topics[]"
                                id="edit_topic_yorp">
                            <label class="form-check-label" for="edit_topic_yorp">YORP (Youth Organization
                                Registration Program)</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_specific_objectives">Specific Objectives of the Discussion of
                                    NYC</label>
                                <textarea class="form-control" name="specific_objectives" id="edit_specific_objectives"
                                    placeholder="Specific Objectives"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_specific_outputs">Specific Outputs of the Discussion of NYC</label>
                                <textarea class="form-control" name="specific_outputs" id="edit_specific_outputs" placeholder="Specific Outputs"></textarea>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-2">Equipment Available</h3>
                    <div class="form-group">
                        <label>Check Equipment Available at the Activity Venue <span
                                class="text-danger">*</span></label><br>
                        <button type="button" id="edit-select-all-equipment" class="btn btn-primary btn-sm">Select
                            All</button>
                        <button type="button" id="edit-deselect-all-equipment"
                            class="btn btn-secondary btn-sm">Deselect
                            All</button>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input equipment" type="checkbox" name="equipment[]"
                                value="Projector" id="edit_equipment_projector">
                            <label class="form-check-label" for="edit_equipment_projector">Projector</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input equipment" type="checkbox" value="Speaker"
                                name="equipment[]" id="edit_equipment_speaker">
                            <label class="form-check-label" for="edit_equipment_speaker">Speaker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input equipment" type="checkbox" value="Microphone"
                                name="equipment[]" id="edit_equipment_microphone">
                            <label class="form-check-label" for="edit_equipment_microphone">Microphone</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input equipment" type="checkbox" value="Clicker"
                                name="equipment[]" id="edit_equipment_clicker">
                            <label class="form-check-label" for="edit_equipment_clicker">Clicker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input equipment" type="checkbox" value="Podium"
                                name="equipment[]" id="edit_equipment_podium">
                            <label class="form-check-label" for="edit_equipment_podium">Podium</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input equipment" type="checkbox" value="LED Screen"
                                name="equipment[]" id="edit_equipment_led_screen">
                            <label class="form-check-label" for="edit_equipment_led_screen">LED Screen</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input equipment" type="checkbox"
                                value="Video conference application" name="equipment[]"
                                id="edit_equipment_video_conference">
                            <label class="form-check-label" for="edit_equipment_video_conference">If webinar, video
                                conference application</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="others_equipment">Others</label>
                        <textarea class="form-control" name="others_equipment" placeholder="Enter Others" id="edit_others_equipment"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Name with signature of representative of organization (Pdf File) + Date
                            Signed (Don't put a file if you dont want to change the file)</label>
                        <input type="file" class="form-control" name="file" id="file"
                            onchange="validateFile(this)">
                        <div id="edit-fileError" class="invalid-feedback" style="display:none"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('edit-select-all-audience').addEventListener('click', function() {
        document.querySelectorAll('input[name="audience[]"]').forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });

    document.getElementById('edit-deselect-all-audience').addEventListener('click', function() {
        document.querySelectorAll('input[name="audience[]"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });
    });

    document.getElementById('edit-select-all-topics').addEventListener('click', function() {
        document.querySelectorAll('input[name="topics[]"]').forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });

    document.getElementById('edit-deselect-all-topics').addEventListener('click', function() {
        document.querySelectorAll('input[name="topics[]"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });
    });

    document.getElementById('edit-select-all-equipment').addEventListener('click', function() {
        document.querySelectorAll('input[name="equipment[]"]').forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });

    document.getElementById('edit-deselect-all-equipment').addEventListener('click', function() {
        document.querySelectorAll('input[name="equipment[]"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });
    });

    function validateFile(input) {
        if (!input.files || !input.files[0]) {
            return true;
        }

        const file = input.files[0];
        const fileError = document.getElementById('edit-fileError');
        const submitBtn = document.getElementById('submitBtn');

        // Reset validation state
        input.classList.remove('is-invalid');
        fileError.style.display = 'none';
        submitBtn.disabled = false;

        // Check if file is PDF
        if (file.type !== 'application/pdf') {
            // Clear the file input
            input.value = '';

            // Show error
            input.classList.add('is-invalid');
            fileError.textContent = 'Only PDF files are allowed';
            fileError.style.display = 'block';
            submitBtn.disabled = true;
            return false;
        }

        return true;
    }
</script>
