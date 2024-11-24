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
                                <input type="text" class="form-control" id="edit_activity_name"
                                    placeholder="Activity Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_date">Date</label>
                                <input type="text" class="form-control" id="edit_date" placeholder="Date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_venue">Venue</label>
                                <input type="text" class="form-control" id="edit_venue" placeholder="Venue">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_time">Time</label>
                                <input type="text" class="form-control" id="edit_time" placeholder="Time">
                            </div>
                        </div>
                    </div>

                    <!-- Part 2: Target Audience -->
                    <h3 class="mt-2">Target Audience</h3>
                    <div class="form-group">
                        <label>Audience</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sangguniang Kabataan"
                                id="edit_audience_sangguniang_kabataan">
                            <label class="form-check-label" for="edit_audience_sangguniang_kabataan">Sangguniang
                                Kabataan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Youth Organization / Local Youth Development Council Member"
                                id="edit_audience_youth_organization">
                            <label class="form-check-label" for="edit_audience_youth_organization">Youth Organization /
                                Local Youth Development Council Member</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Local Youth Development Officers"
                                id="edit_audience_local_youth_development_officers">
                            <label class="form-check-label" for="edit_audience_local_youth_development_officers">Local
                                Youth Development Officers</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Students"
                                id="edit_audience_students">
                            <label class="form-check-label" for="edit_audience_students">Students</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="OSYs" id="edit_audience_osys">
                            <label class="form-check-label" for="edit_audience_osys">OSYs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="NGOs" id="edit_audience_ngos">
                            <label class="form-check-label" for="edit_audience_ngos">NGOs</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Regional Line Agencies"
                                id="edit_audience_regional_line_agencies">
                            <label class="form-check-label" for="edit_audience_regional_line_agencies">Regional Line
                                Agencies</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="LGU Employees"
                                id="edit_audience_lgu_employees">
                            <label class="form-check-label" for="edit_audience_lgu_employees">LGU Employees</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="General Public"
                                id="edit_audience_general_public">
                            <label class="form-check-label" for="edit_audience_general_public">General Public</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_others">Others</label>
                                <textarea class="form-control" id="edit_others" placeholder="Enter Others"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_expected_number_of_participants">Expected Number of
                                    Participants</label>
                                <input type="text" class="form-control" id="edit_expected_number_of_participants"
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
                                id="edit_topic_leadership">
                            <label class="form-check-label" for="edit_topic_leadership">Leadership</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Resource mobilization"
                                id="edit_topic_resource_mobilization">
                            <label class="form-check-label" for="edit_topic_resource_mobilization">Resource
                                mobilization</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Legislative advocacy"
                                id="edit_topic_legislative_advocacy">
                            <label class="form-check-label" for="edit_topic_legislative_advocacy">Legislative
                                advocacy</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Government procurement"
                                id="edit_topic_government_procurement">
                            <label class="form-check-label" for="edit_topic_government_procurement">Government
                                procurement</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Budgeting"
                                id="edit_topic_budgeting">
                            <label class="form-check-label" for="edit_topic_budgeting">Budgeting</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Disaster risk response"
                                id="edit_topic_disaster_risk_response">
                            <label class="form-check-label" for="edit_topic_disaster_risk_response">Disaster risk
                                response</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Proposal Making"
                                id="edit_topic_proposal_making">
                            <label class="form-check-label" for="edit_topic_proposal_making">Proposal Making</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="Code of conduct and ethical standards" id="edit_topic_code_of_conduct">
                            <label class="form-check-label" for="edit_topic_code_of_conduct">Code of conduct and
                                ethical standards</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Team building"
                                id="edit_topic_team_building">
                            <label class="form-check-label" for="edit_topic_team_building">Team building</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Planning"
                                id="edit_topic_planning">
                            <label class="form-check-label" for="edit_topic_planning">Planning</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Public speaking"
                                id="edit_topic_public_speaking">
                            <label class="form-check-label" for="edit_topic_public_speaking">Public speaking</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Gender and development"
                                id="edit_topic_gender_and_development">
                            <label class="form-check-label" for="edit_topic_gender_and_development">Gender and
                                development</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Environment protection"
                                id="edit_topic_environment_protection">
                            <label class="form-check-label" for="edit_topic_environment_protection">Environment
                                protection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Ordinance writing"
                                id="edit_topic_ordinance_writing">
                            <label class="form-check-label" for="edit_topic_ordinance_writing">Ordinance
                                writing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Situational Analysis"
                                id="edit_topic_situational_analysis">
                            <label class="form-check-label" for="edit_topic_situational_analysis">Situational
                                Analysis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Monitoring and evaluation"
                                id="edit_topic_monitoring_and_evaluation">
                            <label class="form-check-label" for="edit_topic_monitoring_and_evaluation">Monitoring and
                                evaluation</label>
                        </div>

                        <!-- Existing topics below -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Financial management"
                                id="edit_topic_financial_management">
                            <label class="form-check-label" for="edit_topic_financial_management">Financial
                                management</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="RA 8044" id="edit_topic_ra8044">
                            <label class="form-check-label" for="edit_topic_ra8044">RA 8044 (Youth in Nation-Building
                                Act)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="RA 10742"
                                id="edit_topic_ra10742">
                            <label class="form-check-label" for="edit_topic_ra10742">RA 10742 (Sangguniang Kabataan
                                Reform Act of 2015)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="SK" id="edit_topic_sk">
                            <label class="form-check-label" for="edit_topic_sk">SK (Sangguniang Kabataan)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="LYDO" id="edit_topic_lydo">
                            <label class="form-check-label" for="edit_topic_lydo">LYDO (Local Youth Devt
                                Office)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="LYDC" id="edit_topic_lydc">
                            <label class="form-check-label" for="edit_topic_lydc">LYDC (Local Youth Devt
                                Council)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="YORP" id="edit_topic_yorp">
                            <label class="form-check-label" for="edit_topic_yorp">YORP (Youth Organization
                                Registration Program)</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_specific_objectives">Specific Objectives of the Discussion of
                                    NYC</label>
                                <textarea class="form-control" id="edit_specific_objectives" placeholder="Specific Objectives"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_specific_outputs">Specific Outputs of the Discussion of NYC</label>
                                <textarea class="form-control" id="edit_specific_outputs" placeholder="Specific Outputs"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Part 4: Equipment Available -->
                    <h3 class="mt-2">Equipment Available</h3>
                    <div class="form-group">
                        <label>Equipment</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Projector"
                                id="edit_equipment_projector">
                            <label class="form-check-label" for="edit_equipment_projector">Projector</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Speaker"
                                id="edit_equipment_speaker">
                            <label class="form-check-label" for="edit_equipment_speaker">Speaker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Microphone"
                                id="edit_equipment_microphone">
                            <label class="form-check-label" for="edit_equipment_microphone">Microphone</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Clicker"
                                id="edit_equipment_clicker">
                            <label class="form-check-label" for="edit_equipment_clicker">Clicker</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Podium"
                                id="edit_equipment_podium">
                            <label class="form-check-label" for="edit_equipment_podium">Podium</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="LED Screen"
                                id="edit_equipment_led_screen">
                            <label class="form-check-label" for="edit_equipment_led_screen">LED Screen</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Video conference application"
                                id="edit_equipment_video_conference">
                            <label class="form-check-label" for="edit_equipment_video_conference">If webinar, video
                                conference application</label>
                        </div>
                    </div>

                    <!-- File Download -->
                    <div class="form-group">
                        <label for="file">Name with signature of representative of organization (Pdf File) + Date
                            Signed <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                    <div class="form-group" id="edit_file_existing"></div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
