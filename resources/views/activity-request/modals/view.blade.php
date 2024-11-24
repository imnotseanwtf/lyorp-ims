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
                            <input type="text" class="form-control" id="view_activity_name"
                                placeholder="Activity Name" readonly>
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

                <!-- Part 2: Target Audience -->
                <h3 class="mt-2">Target Audience</h3>
                <div class="form-group">
                    <label>Audience</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Sangguniang Kabataan"
                            id="view_audience_sangguniang_kabataan" disabled>
                        <label class="form-check-label" for="view_audience_sangguniang_kabataan">Sangguniang
                            Kabataan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            value="Youth Organization / Local Youth Development Council Member"
                            id="view_audience_youth_organization" disabled>
                        <label class="form-check-label" for="view_audience_youth_organization">Youth Organization /
                            Local Youth Development Council Member</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Local Youth Development Officers"
                            id="view_audience_local_youth_development_officers" disabled>
                        <label class="form-check-label" for="view_audience_local_youth_development_officers">Local Youth
                            Development Officers</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Students" id="view_audience_students"
                            disabled>
                        <label class="form-check-label" for="view_audience_students">Students</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="OSYs" id="view_audience_osys" disabled>
                        <label class="form-check-label" for="view_audience_osys">OSYs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="NGOs" id="view_audience_ngos" disabled>
                        <label class="form-check-label" for="view_audience_ngos">NGOs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Regional Line Agencies"
                            id="view_audience_regional_line_agencies" disabled>
                        <label class="form-check-label" for="view_audience_regional_line_agencies">Regional Line
                            Agencies</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="LGU Employees"
                            id="view_audience_lgu_employees" disabled>
                        <label class="form-check-label" for="view_audience_lgu_employees">LGU Employees</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="General Public"
                            id="view_audience_general_public" disabled>
                        <label class="form-check-label" for="view_audience_general_public">General Public</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="view_others">Others</label>
                            <textarea class="form-control" id="view_others" placeholder="Enter Others" readonly></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="view_expected_number_of_participants">Expected Number of Participants</label>
                            <input type="text" class="form-control" id="view_expected_number_of_participants"
                                placeholder="Expected Number of Participants" readonly>
                        </div>
                    </div>
                </div>

                <h3 class="mt-2">Topics to be Discussed</h3>
                <div class="form-group">
                    <label>Topics</label><br>

                    <!-- Updated Topics -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Leadership"
                            id="view_topic_leadership" disabled>
                        <label class="form-check-label" for="view_topic_leadership">Leadership</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Resource mobilization"
                            id="view_topic_resource_mobilization" disabled>
                        <label class="form-check-label" for="view_topic_resource_mobilization">Resource
                            mobilization</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Legislative advocacy"
                            id="view_topic_legislative_advocacy" disabled>
                        <label class="form-check-label" for="view_topic_legislative_advocacy">Legislative
                            advocacy</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Government procurement"
                            id="view_topic_government_procurement" disabled>
                        <label class="form-check-label" for="view_topic_government_procurement">Government
                            procurement</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Budgeting" id="view_topic_budgeting"
                            disabled>
                        <label class="form-check-label" for="view_topic_budgeting">Budgeting</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Disaster risk response"
                            id="view_topic_disaster_risk_response" disabled>
                        <label class="form-check-label" for="view_topic_disaster_risk_response">Disaster risk
                            response</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Proposal Making"
                            id="view_topic_proposal_making" disabled>
                        <label class="form-check-label" for="view_topic_proposal_making">Proposal Making</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Code of conduct and ethical standards"
                            id="view_topic_code_of_conduct" disabled>
                        <label class="form-check-label" for="view_topic_code_of_conduct">Code of conduct and ethical
                            standards</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Team building"
                            id="view_topic_team_building" disabled>
                        <label class="form-check-label" for="view_topic_team_building">Team building</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Planning" id="view_topic_planning"
                            disabled>
                        <label class="form-check-label" for="view_topic_planning">Planning</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Public speaking"
                            id="view_topic_public_speaking" disabled>
                        <label class="form-check-label" for="view_topic_public_speaking">Public speaking</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Gender and development"
                            id="view_topic_gender_and_development" disabled>
                        <label class="form-check-label" for="view_topic_gender_and_development">Gender and
                            development</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Environment protection"
                            id="view_topic_environment_protection" disabled>
                        <label class="form-check-label" for="view_topic_environment_protection">Environment
                            protection</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Ordinance writing"
                            id="view_topic_ordinance_writing" disabled>
                        <label class="form-check-label" for="view_topic_ordinance_writing">Ordinance writing</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Situational Analysis"
                            id="view_topic_situational_analysis" disabled>
                        <label class="form-check-label" for="view_topic_situational_analysis">Situational
                            Analysis</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Monitoring and evaluation"
                            id="view_topic_monitoring_and_evaluation" disabled>
                        <label class="form-check-label" for="view_topic_monitoring_and_evaluation">Monitoring and
                            evaluation</label>
                    </div>

                    <!-- Existing topics below -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Financial management"
                            id="view_topic_financial_management" disabled>
                        <label class="form-check-label" for="view_topic_financial_management">Financial
                            management</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="RA 8044" id="view_topic_ra8044"
                            disabled>
                        <label class="form-check-label" for="view_topic_ra8044">RA 8044 (Youth in Nation-Building Act)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="RA 10742" id="view_topic_ra10742"
                            disabled>
                        <label class="form-check-label" for="view_topic_ra10742">RA 10742 (Sangguniang Kabataan Reform Act of 2015)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="SK" id="view_topic_sk" disabled>
                        <label class="form-check-label" for="view_topic_sk">SK (Sangguniang Kabataan)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="LYDO" id="view_topic_lydo"
                            disabled>
                        <label class="form-check-label" for="view_topic_lydo">LYDO (Local Youth Devt Office)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="LYDC" id="view_topic_lydc"
                            disabled>
                        <label class="form-check-label" for="view_topic_lydc">LYDC (Local Youth Devt Council)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="YORP" id="view_topic_yorp"
                            disabled>
                        <label class="form-check-label" for="view_topic_yorp">YORP (Youth Organziation Registration Program)</label>
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
                        <input class="form-check-input" type="checkbox" value="Projector"
                            id="view_equipment_projector" disabled>
                        <label class="form-check-label" for="view_equipment_projector">Projector</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Speaker" id="view_equipment_speaker"
                            disabled>
                        <label class="form-check-label" for="view_equipment_speaker">Speaker</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Microphone"
                            id="view_equipment_microphone" disabled>
                        <label class="form-check-label" for="view_equipment_microphone">Microphone</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Clicker" id="view_equipment_clicker"
                            disabled>
                        <label class="form-check-label" for="view_equipment_clicker">Clicker</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Podium" id="view_equipment_podium"
                            disabled>
                        <label class="form-check-label" for="view_equipment_podium">Podium</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="LED Screen"
                            id="view_equipment_led_screen" disabled>
                        <label class="form-check-label" for="view_equipment_led_screen">LED Screen</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Video conference application"
                            id="view_equipment_video_conference" disabled>
                        <label class="form-check-label" for="view_equipment_video_conference">If webinar, video
                            conference application</label>
                    </div>
                </div>

                <!-- File Download -->
                <div class="form-group">
                    <label for="view_file">Name with signature of representative of organization (Pdf File) + Date
                        Signed</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="view_file" placeholder="File" readonly>
                        <a href="#" id="link_file" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
