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
                                    placeholder="Activity Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_date">Date</label>
                                <input type="text" class="form-control" id="edit_date" name="date"
                                    placeholder="Date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_venue">Venue</label>
                                <input type="text" class="form-control" id="edit_venue" name="venue"
                                    placeholder="Venue">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_time">Time</label>
                                <input type="text" class="form-control" id="edit_time" name="time"
                                    placeholder="Time">
                            </div>
                        </div>
                    </div>

                    <!-- Part 2: Target Audience -->
                    <h3 class="mt-2">Target Audience</h3>
                    <div class="form-group">
                        <label>Audience</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sangguniang Kabataan"
                                id="edit_audience_sangguniang_kabataan" name="audience[]">
                            <label class="form-check-label" for="edit_audience_sangguniang_kabataan">Sangguniang
                                Kabataan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Youth Organization / Local Youth Development Council Member"
                                id="edit_audience_youth_organization" name="audience[]">
                            <label class="form-check-label" for="edit_audience_youth_organization">Youth Organization /
                                Local Youth Development Council Member</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Local Youth Development Officers"
                                id="edit_audience_local_youth_development_officers" name="audience[]">
                            <label class="form-check-label" for="edit_audience_local_youth_development_officers">Local
                                Youth Development Officers</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Students" id="edit_audience_students"
                                name="audience[]">
                            <label class="form-check-label" for="edit_audience_students">Students</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="OSYs" id="edit_audience_osys"
                                name="audience[]">
                            <label class="form-check-label" for="edit_audience_osys">OSYs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="NGOs" id="edit_audience_ngos"
                                name="audience[]">
                            <label class="form-check-label" for="edit_audience_ngos">NGOs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Regional Line Agencies"
                                id="edit_audience_regional_line_agencies" name="audience[]">
                            <label class="form-check-label" for="edit_audience_regional_line_agencies">Regional Line
                                Agencies</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="LGU Employees"
                                id="edit_audience_lgu_employees" name="audience[]">
                            <label class="form-check-label" for="edit_audience_lgu_employees">LGU Employees</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="General Public"
                                id="edit_audience_general_public" name="audience[]">
                            <label class="form-check-label" for="edit_audience_general_public">General Public</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_others">Others</label>
                                <textarea class="form-control" id="edit_others" name="others" placeholder="Enter Others"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_expected_number_of_participants">Expected Number of
                                    Participants</label>
                                <input type="text" class="form-control" id="edit_expected_number_of_participants"
                                    name="expected_number_of_participants"
                                    placeholder="Expected Number of Participants">
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-2">Topics to be Discussed</h3>
                    <div class="form-group">
                        <label>Topics</label><br>

                        <!-- Updated Topics -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Leadership"
                                id="edit_topic_leadership" name="topics[]">
                            <label class="form-check-label" for="edit_topic_leadership">Leadership</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Resource mobilization"
                                id="edit_topic_resource_mobilization" name="topics[]">
                            <label class="form-check-label" for="edit_topic_resource_mobilization">Resource
                                mobilization</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Legislative advocacy"
                                id="edit_topic_legislative_advocacy" name="topics[]">
                            <label class="form-check-label" for="edit_topic_legislative_advocacy">Legislative
                                advocacy</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Government procurement"
                                id="edit_topic_government_procurement" name="topics[]">
                            <label class="form-check-label" for="edit_topic_government_procurement">Government
                                procurement</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Budgeting"
                                id="edit_topic_budgeting" name="topics[]">
                            <label class="form-check-label" for="edit_topic_budgeting">Budgeting</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Disaster risk response"
                                id="edit_topic_disaster_risk_response" name="topics[]">
                            <label class="form-check-label" for="edit_topic_disaster_risk_response">Disaster risk
                                response</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Proposal Making"
                                id="edit_topic_proposal_making" name="topics[]">
                            <label class="form-check-label" for="edit_topic_proposal_making">Proposal Making</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Code of conduct and ethical standards" id="edit_topic_code_of_conduct"
                                name="topics[]">
                            <label class="form-check-label" for="edit_topic_code_of_conduct">Code of conduct and
                                ethical standards</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Team building"
                                id="edit_topic_team_building" name="topics[]">
                            <label class="form-check-label" for="edit_topic_team_building">Team building</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Planning"
                                id="edit_topic_planning" name="topics[]">
                            <label class="form-check-label" for="edit_topic_planning">Planning</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Public speaking"
                                id="edit_topic_public_speaking" name="topics[]">
                            <label class="form-check-label" for="edit_topic_public_speaking">Public speaking</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Gender and development"
                                id="edit_topic_gender_and_development" name="topics[]">
                            <label class="form-check-label" for="edit_topic_gender_and_development">Gender and
                                development</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Environment protection"
                                id="edit_topic_environment_protection" name="topics[]">
                            <label class="form-check-label" for="edit_topic_environment_protection">Environment
                                protection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Ordinance writing"
                                id="edit_topic_ordinance_writing" name="topics[]">
                            <label class="form-check-label" for="edit_topic_ordinance_writing">Ordinance
                                writing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Situational Analysis"
                                id="edit_topic_situational_analysis" name="topics[]">
                            <label class="form-check-label" for="edit_topic_situational_analysis">Situational
                                Analysis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Monitoring and evaluation"
                                id="edit_topic_monitoring_and_evaluation" name="topics[]">
                            <label class="form-check-label" for="edit_topic_monitoring_and_evaluation">Monitoring and
                                evaluation</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_specific_objectives">Specific Objectives of the Discussion of
                                    NYC</label>
                                <textarea class="form-control" id="edit_specific_objectives" name="specific_objectives"
                                    placeholder="Specific Objectives"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_specific_outputs">Specific Outputs of the Discussion of NYC</label>
                                <textarea class="form-control" id="edit_specific_outputs" name="specific_outputs" placeholder="Specific Outputs"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Part 4: Equipment Available -->
                    <h3 class="mt-2">Equipment Available</h3>
                    <div class="form-group">
                        <label>Equipment</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Projector"
                                id="edit_equipment_projector" name="equipment[]">
                            <label class="form-check-label" for="edit_equipment_projector">Projector</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Speaker"
                                id="edit_equipment_speaker" name="equipment[]">
                            <label class="form-check-label" for="edit_equipment_speaker">Speaker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Microphone"
                                id="edit_equipment_microphone" name="equipment[]">
                            <label class="form-check-label" for="edit_equipment_microphone">Microphone</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Clicker"
                                id="edit_equipment_clicker" name="equipment[]">
                            <label class="form-check-label" for="edit_equipment_clicker">Clicker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Podium"
                                id="edit_equipment_podium" name="equipment[]">
                            <label class="form-check-label" for="edit_equipment_podium">Podium</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="LED Screen"
                                id="edit_equipment_led_screen" name="equipment[]">
                            <label class="form-check-label" for="edit_equipment_led_screen">LED Screen</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Video conference application"
                                id="edit_equipment_video_conference" name="equipment[]">
                            <label class="form-check-label" for="edit_equipment_video_conference">If webinar, video
                                conference application</label>
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div class="form-group">
                        <label for="edit_file">Name with signature of representative of organization (Pdf File) + Date
                            Signed</label>
                        <input type="file" class="form-control" id="edit_file" name="file">
                        <small class="form-text text-muted">Leave blank if you don't want to change the existing
                            file.</small>
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
