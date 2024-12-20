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
                                <label for="activity_name">Activity Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="activity_name"
                                    placeholder="Enter activity name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date"
                                    min="{{ date('Y-m-d', strtotime('+5 days')) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="venue">Venue <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="venue" placeholder="Enter venue"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time">Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="time" required>
                                <div id="timeError" class="invalid-feedback" style="display:none">Please select a valid
                                    time.</div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-2">Target Audience</h3>
                    <div class="form-group">
                        <label>Select Audience <span class="text-danger">*</span></label> <br>
                        <button type="button" id="select-all-audience" class="btn btn-primary btn-sm">Select
                            All</button>
                        <button type="button" id="deselect-all-audience" class="btn btn-secondary btn-sm">Deselect
                            All</button>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]"
                                value="Sangguniang Kabataan">
                            <label class="form-check-label">Sangguniang Kabataan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]"
                                value="Youth Organization / Local Youth Development Council Member">
                            <label class="form-check-label">Youth Organization / Local Youth Development Council
                                Member</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]"
                                value="Local Youth Development Officers">
                            <label class="form-check-label">Local Youth Development Officers</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]" value="Students">
                            <label class="form-check-label">Students</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]" value="OSYs">
                            <label class="form-check-label">OSYs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]" value="NGOs">
                            <label class="form-check-label">NGOs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]"
                                value="Regional Line Agencies">
                            <label class="form-check-label">Regional Line Agencies</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]" value="LGU Employees">
                            <label class="form-check-label">LGU Employees</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="audience[]"
                                value="General Public">
                            <label class="form-check-label">General Public</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="others">Others</label>
                                <textarea class="form-control" name="others" placeholder="Enter Others"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="expected_number_of_participants">Expected Number of participants <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="expected_number_of_participants"
                                    placeholder="Enter Expected Number of participants" required></input>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-2">Topics to be Discussed</h3>
                    <div class="form-group">
                        <label>Select Topics <span class="text-danger">*</span></label><br>
                        <button type="button" id="select-all-topics" class="btn btn-primary btn-sm">Select
                            All</button>
                        <button type="button" id="deselect-all-topics" class="btn btn-secondary btn-sm">Deselect
                            All</button>
                        <br><br>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="Leadership">
                            <label class="form-check-label">Leadership</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Resource mobilization">
                            <label class="form-check-label">Resource mobilization</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Legislative advocacy">
                            <label class="form-check-label">Legislative advocacy</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Government procurement">
                            <label class="form-check-label">Government procurement</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="Budgeting">
                            <label class="form-check-label">Budgeting</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Disaster risk response">
                            <label class="form-check-label">Disaster risk response</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="Proposal Making">
                            <label class="form-check-label">Proposal Making</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Code of conduct and ethical standards">
                            <label class="form-check-label">Code of conduct and ethical standards</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="Team building">
                            <label class="form-check-label">Team building</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="Planning">
                            <label class="form-check-label">Planning</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="Public speaking">
                            <label class="form-check-label">Public speaking</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Gender and development">
                            <label class="form-check-label">Gender and development</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Environment protection">
                            <label class="form-check-label">Environment protection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Ordinance writing">
                            <label class="form-check-label">Ordinance writing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Situational Analysis">
                            <label class="form-check-label">Situational Analysis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Monitoring and evaluation">
                            <label class="form-check-label">Monitoring and evaluation</label>
                        </div>
                        <!-- Existing topics below -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]"
                                value="Financial management">
                            <label class="form-check-label">Financial management</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="RA 8044">
                            <label class="form-check-label">RA 8044 (Youth in Nation-Building Act)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="RA 10742">
                            <label class="form-check-label">RA 10742 (Sangguniang Kabataan Reform Act of 2015)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="SK">
                            <label class="form-check-label">SK (Sangguniang Kabataan)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="LYDO">
                            <label class="form-check-label">LYDO (Local Youth Devt Office)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="LYDC">
                            <label class="form-check-label">LYDC (Local Youth Devt Council)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="topics[]" value="YORP">
                            <label class="form-check-label">YORP (Youth Organziation Registration Program)</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specific_objectives">Specific Objectives of the Discussion of CSSD <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="specific_objectives" placeholder="Enter specific objectives" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specific_outputs">Specific Outputs of the Discussion of CSSD <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="specific_outputs" placeholder="Enter specific outputs" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Part 4: Equipment Available -->
                    <h3 class="mt-2">Equipment Available</h3>
                    <div class="form-group">
                        <label>Check Equipment Available at the Activity Venue <span
                                class="text-danger">*</span></label><br>
                        <button type="button" id="select-all-equipment" class="btn btn-primary btn-sm">Select
                            All</button>
                        <button type="button" id="deselect-all-equipment" class="btn btn-secondary btn-sm">Deselect
                            All</button>
                        <br><br>
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

                    <div class="form-group">
                        <label for="others_equipment">Others</label>
                        <textarea class="form-control" name="others_equipment" placeholder="Enter Others"></textarea>
                    </div>

                    <!-- File Upload -->
                    <div class="form-group">
                        <label for="file">Name with signature of representative of organization (Pdf File) + Date
                            Signed <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="file" id="file" required
                            onchange="validateFiles(this)">
                        <div id="fileError" class="invalid-feedback" style="display:none"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submitBtn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Get all checkboxes for all groups
    const audienceCheckboxes = document.querySelectorAll('input[name="audience[]"]');
    const topicsCheckboxes = document.querySelectorAll('input[name="topics[]"]');
    const equipmentCheckboxes = document.querySelectorAll('input[name="equipment[]"]');

    audienceCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            console.log(
                `Audience checkbox ${checkbox.value} is ${checkbox.checked ? 'checked' : 'unchecked'}`
            );
        });
    });

    topicsCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            console.log(
                `Topics checkbox ${checkbox.value} is ${checkbox.checked ? 'checked' : 'unchecked'}`
            );
        });
    });

    equipmentCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            console.log(
                `Equipment checkbox ${checkbox.value} is ${checkbox.checked ? 'checked' : 'unchecked'}`
            );
        });
    });


    // Get first checkbox of each group
    const firstAudienceCheckbox = audienceCheckboxes[0];
    const firstTopicsCheckbox = topicsCheckboxes[0];
    const firstEquipmentCheckbox = equipmentCheckboxes[0];


    // Function to check if any checkbox in a group is checked and update required attribute
    function updateRequired(checkboxes, firstCheckbox) {
        const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

        if (anyChecked) {
            // If any checkbox is checked, remove required from first checkbox
            firstCheckbox.removeAttribute('required');
        } else {
            // If no checkbox is checked, add required to first checkbox
            firstCheckbox.setAttribute('required', '');
        }
    }

    // Function to handle all groups
    function updateAllRequired() {
        updateRequired(audienceCheckboxes, firstAudienceCheckbox);
        updateRequired(topicsCheckboxes, firstTopicsCheckbox);
        updateRequired(equipmentCheckboxes, firstEquipmentCheckbox);
    }

    // Add event listeners to all checkboxes in all groups
    audienceCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateAllRequired);
    });

    topicsCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateAllRequired);
    });

    equipmentCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateAllRequired);
    });

    // Run once on page load to set initial state
    updateAllRequired();


    document.getElementById('select-all-audience').addEventListener('click', function() {
        document.querySelectorAll('input[name="audience[]"]').forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });

    document.getElementById('deselect-all-audience').addEventListener('click', function() {
        document.querySelectorAll('input[name="audience[]"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });
    });

    document.getElementById('select-all-topics').addEventListener('click', function() {
        document.querySelectorAll('input[name="topics[]"]').forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });

    document.getElementById('deselect-all-topics').addEventListener('click', function() {
        document.querySelectorAll('input[name="topics[]"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });
    });

    document.getElementById('select-all-equipment').addEventListener('click', function() {
        document.querySelectorAll('input[name="equipment[]"]').forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });

    document.getElementById('deselect-all-equipment').addEventListener('click', function() {
        document.querySelectorAll('input[name="equipment[]"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });
    });

    function validateFiles(input) {
        if (!input.files || !input.files[0]) {
            return true;
        }

        const file = input.files[0];
        const fileError = document.getElementById('fileError');
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
