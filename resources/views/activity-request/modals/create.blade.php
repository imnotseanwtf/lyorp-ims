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
                                <label for="activity_name">Activity Name  <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="activity_name"
                                    placeholder="Enter activity name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date" min="{{ date('Y-m-d') }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="venue">Venue  <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="venue" placeholder="Enter venue"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time">Time  <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="time" required>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-2">Target Audience</h3>
                    <div class="form-group">
                        <label>Select Audience</label><br>
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
                                <label for="expected_number_of_participants">Expected Number of participants  <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="expected_number_of_participants"
                                    placeholder="Enter Expected Number of participants" required></input>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-2">Topics to be Discussed</h3>
                    <div class="form-group">
                        <label>Select Topics  <span class="text-danger">*</span></label><br>

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
                            <label class="form-check-label">YORP  (Youth Organziation Registration Program)</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specific_objectives">Specific Objectives of the Discussion of CSSD  <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="specific_objectives" placeholder="Enter specific objectives" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specific_outputs">Specific Outputs of the Discussion of CSSD  <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="specific_outputs" placeholder="Enter specific outputs" required></textarea>
                            </div>
                        </div>
                    </div>



                    <!-- Part 4: Equipment Available -->
                    <h3 class="mt-2">Equipment Available</h3>
                    <div class="form-group">
                        <label>Check Equipment Available at the Activity Venue  <span class="text-danger">*</span></label><br>
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
                        <input type="file" class="form-control" name="file" required>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
