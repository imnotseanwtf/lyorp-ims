@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Technical Assistance</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Technical Assistance') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    <button class="main-btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" style="width: 200px;">
                        Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('activity-request.index') }}">All</a></li>
                        <li><a class="dropdown-item" href="{{ route('activity-request.index', 1) }}">Accepted</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('activity-request.index', 2) }}">Rejected</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('activity-request.index', 3) }}">Done</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('activity-request.index', 4) }}">Canceled</a>
                        </li>
                    </ul>
                    @organization
                        <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                            Create Activity Request
                        </button>
                    @endorganization

                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    {{-- CREATE ACTIVITY REQUEST --}}
    @include('activity-request.modals.create')

    {{-- VIEW ACTIVITY REQUEST --}}
    @include('activity-request.modals.view')

    {{-- EDIT ACTIVITY REQUEST --}}
    @include('activity-request.modals.edit')

    {{-- DELETE ACTIVITY REQUEST --}}
    @include('activity-request.modals.delete')

    {{-- ACCEPT ACTIVITY REQUEST --}}
    @include('activity-request.modals.accept')

    {{-- REJECT ACTIVITY REQUEST --}}
    @include('activity-request.modals.reject')

    @include('activity-request.modals.review')

    @include('activity-request.modals.done')

    @include('activity-request.modals.cancel')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'))
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
        $(() => {
            const tableInstance = window.LaravelDataTables['activityRequest_dataTable'] = $(
                    '#activityRequest_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {


                $('.viewBtn').click(function() {
                    fetch('/activity-request/' + $(this).data('activity'))
                        .then(response => response.json())
                        .then(activity => {
                            // General Information
                            $('#view_activity_name').val(activity.activity_name);
                            $('#view_date').val(activity.date);
                            $('#view_venue').val(activity.venue);
                            $('#view_time').val(activity.time);

                            // Target Audience
                            $('#view_audience_sangguniang_kabataan').prop('checked', activity
                                .audience.includes('Sangguniang Kabataan'));
                            $('#view_audience_youth_organization').prop('checked', activity
                                .audience.includes(
                                    'Youth Organization / Local Youth Development Council Member'
                                ));
                            $('#view_audience_local_youth_development_officers').prop('checked',
                                activity.audience.includes(
                                    'Local Youth Development Officers'));
                            $('#view_audience_students').prop('checked', activity.audience
                                .includes('Students'));
                            $('#view_audience_osys').prop('checked', activity.audience.includes(
                                'OSYs'));
                            $('#view_audience_ngos').prop('checked', activity.audience.includes(
                                'NGOs'));
                            $('#view_audience_regional_line_agencies').prop('checked', activity
                                .audience.includes('Regional Line Agencies'));
                            $('#view_audience_lgu_employees').prop('checked', activity.audience
                                .includes('LGU Employees'));
                            $('#view_audience_general_public').prop('checked', activity.audience
                                .includes('General Public'));
                            $('#view_others').val(activity.others ||
                                ''); // Handle optional field
                            $('#view_expected_number_of_participants').val(activity
                                .expected_number_of_participants);

                            // Topics to be Discussed
                            $('#view_topic_leadership').prop('checked', activity.topics
                                .includes('Leadership'));
                            $('#view_topic_resource_mobilization').prop('checked', activity
                                .topics.includes('Resource mobilization'));
                            $('#view_topic_legislative_advocacy').prop('checked', activity
                                .topics.includes('Legislative advocacy'));
                            $('#view_topic_government_procurement').prop('checked', activity
                                .topics.includes('Government procurement'));
                            $('#view_topic_budgeting').prop('checked', activity.topics.includes(
                                'Budgeting'));
                            $('#view_topic_disaster_risk_response').prop('checked', activity
                                .topics.includes('Disaster risk response'));
                            $('#view_topic_proposal_making').prop('checked', activity.topics
                                .includes('Proposal Making'));
                            $('#view_topic_code_of_conduct').prop('checked', activity.topics
                                .includes('Code of conduct and ethical standards'));
                            $('#view_topic_team_building').prop('checked', activity.topics
                                .includes('Team building'));
                            $('#view_topic_planning').prop('checked', activity.topics.includes(
                                'Planning'));
                            $('#view_topic_public_speaking').prop('checked', activity.topics
                                .includes('Public speaking'));
                            $('#view_topic_gender_and_development').prop('checked', activity
                                .topics.includes('Gender and development'));
                            $('#view_topic_environment_protection').prop('checked', activity
                                .topics.includes('Environment protection'));
                            $('#view_topic_ordinance_writing').prop('checked', activity.topics
                                .includes('Ordinance writing'));
                            $('#view_topic_situational_analysis').prop('checked', activity
                                .topics.includes('Situational Analysis'));
                            $('#view_topic_monitoring_and_evaluation').prop('checked', activity
                                .topics.includes('Monitoring and evaluation'));

                            // Existing topics (the ones that were already in the initial HTML)
                            $('#view_topic_financial_management').prop('checked', activity
                                .topics.includes('Financial management'));
                            $('#view_topic_ra8044').prop('checked', activity.topics.includes(
                                'RA 8044'));
                            $('#view_topic_ra10742').prop('checked', activity.topics.includes(
                                'RA 10742'));
                            $('#view_topic_sk').prop('checked', activity.topics.includes('SK'));
                            $('#view_topic_lydo').prop('checked', activity.topics.includes(
                                'LYDO'));
                            $('#view_topic_lydc').prop('checked', activity.topics.includes(
                                'LYDC'));
                            $('#view_topic_yorp').prop('checked', activity.topics.includes(
                                'YORP'));
                            $('#view_topic_asrh').prop('checked', activity.topics.includes(
                                'ASRH'));

                            // Specific Objectives and Outputs
                            $('#view_specific_objectives').val(activity.specific_objectives);
                            $('#view_specific_outputs').val(activity.specific_outputs);

                            $('#view_others_audience').val(activity.others);
                            $('#view_others_equipment').val(activity.others_equipment);

                            // Equipment Available
                            $('#view_equipment_projector').prop('checked', activity.equipment
                                .includes('Projector'));
                            $('#view_equipment_speaker').prop('checked', activity.equipment
                                .includes('Speaker'));
                            $('#view_equipment_microphone').prop('checked', activity.equipment
                                .includes('Microphone'));
                            $('#view_equipment_clicker').prop('checked', activity.equipment
                                .includes('Clicker'));
                            $('#view_equipment_podium').prop('checked', activity.equipment
                                .includes('Podium'));
                            $('#view_equipment_led_screen').prop('checked', activity.equipment
                                .includes('LED Screen'));
                            $('#view_equipment_video_conference').prop('checked', activity
                                .equipment.includes('Video conference application'));

                            /// File Download Link
                            function setLinkOrMessage(fileKey, linkId, inputId, customName) {
                                const fileName = activity[fileKey];
                                if (fileName) {
                                    $(`#${linkId}`)
                                        .attr('href', '/storage/' + fileName)
                                        .attr('download', customName ||
                                            fileName) // Set custom download name if provided
                                        .show();
                                    $(`#${inputId}`).val(fileName).show();
                                } else {
                                    $(`#${linkId}`).hide();
                                    $(`#${inputId}`).val('No file').show();
                                }
                            }

                            // Format date to YYYY-MM-DD
                            const formattedDate = activity.date ? new Date(activity.created_at)
                                .toISOString().split('T')[0] : '';

                            // Call with custom download name including date
                            setLinkOrMessage('file', 'link_file', 'view_file',
                                `TechnicalAssistant_${formattedDate}.pdf`);
                        });
                });



                $('.editBtn').click(function() {
                    const activityId = $(this).data('activity'); // Get activity ID from the button
                    fetch('/activity-request/' +
                            activityId) // Fetch the activity data from the server
                        .then(response => response.json())
                        .then(activity => {
                            // General Information
                            $('#edit_activity_name').val(activity.activity_name);
                            $('#edit_date').val(activity.date);
                            $('#edit_venue').val(activity.venue);
                            $('#edit_time').val(activity.time);

                            // Target Audience
                            $('#edit_audience_sangguniang_kabataan').prop('checked', activity
                                .audience.includes('Sangguniang Kabataan'));
                            $('#edit_audience_youth_organization').prop('checked', activity
                                .audience.includes(
                                    'Youth Organization / Local Youth Development Council Member'
                                ));
                            $('#edit_audience_local_youth_development_officers').prop('checked',
                                activity.audience.includes(
                                    'Local Youth Development Officers'));
                            $('#edit_audience_students').prop('checked', activity.audience
                                .includes('Students'));
                            $('#edit_audience_osys').prop('checked', activity.audience.includes(
                                'OSYs'));
                            $('#edit_audience_ngos').prop('checked', activity.audience.includes(
                                'NGOs'));
                            $('#edit_audience_regional_line_agencies').prop('checked', activity
                                .audience.includes('Regional Line Agencies'));
                            $('#edit_audience_lgu_employees').prop('checked', activity.audience
                                .includes('LGU Employees'));
                            $('#edit_audience_general_public').prop('checked', activity.audience
                                .includes('General Public'));
                            $('#edit_others').val(activity.others || ''); // Optional field
                            $('#edit_expected_number_of_participants').val(activity
                                .expected_number_of_participants);

                            // Topics to be Discussed
                            $('#edit_topic_leadership').prop('checked', activity.topics
                                .includes('Leadership'));
                            $('#edit_topic_resource_mobilization').prop('checked', activity
                                .topics.includes('Resource mobilization'));
                            $('#edit_topic_legislative_advocacy').prop('checked', activity
                                .topics.includes('Legislative advocacy'));
                            $('#edit_topic_government_procurement').prop('checked', activity
                                .topics.includes('Government procurement'));
                            $('#edit_topic_budgeting').prop('checked', activity.topics.includes(
                                'Budgeting'));
                            $('#edit_topic_disaster_risk_response').prop('checked', activity
                                .topics.includes('Disaster risk response'));
                            $('#edit_topic_proposal_making').prop('checked', activity.topics
                                .includes('Proposal Making'));
                            $('#edit_topic_code_of_conduct').prop('checked', activity.topics
                                .includes('Code of conduct and ethical standards'));
                            $('#edit_topic_team_building').prop('checked', activity.topics
                                .includes('Team building'));
                            $('#edit_topic_planning').prop('checked', activity.topics.includes(
                                'Planning'));
                            $('#edit_topic_public_speaking').prop('checked', activity.topics
                                .includes('Public speaking'));
                            $('#edit_topic_gender_and_development').prop('checked', activity
                                .topics.includes('Gender and development'));
                            $('#edit_topic_environment_protection').prop('checked', activity
                                .topics.includes('Environment protection'));
                            $('#edit_topic_ordinance_writing').prop('checked', activity.topics
                                .includes('Ordinance writing'));
                            $('#edit_topic_situational_analysis').prop('checked', activity
                                .topics.includes('Situational Analysis'));
                            $('#edit_topic_monitoring_and_evaluation').prop('checked', activity
                                .topics.includes('Monitoring and evaluation'));

                            // Existing topics (the ones that were already in the initial HTML)
                            $('#edit_topic_financial_management').prop('checked', activity
                                .topics.includes('Financial management'));
                            $('#edit_topic_ra8044').prop('checked', activity.topics.includes(
                                'RA 8044'));
                            $('#edit_topic_ra10742').prop('checked', activity.topics.includes(
                                'RA 10742'));
                            $('#edit_topic_sk').prop('checked', activity.topics.includes('SK'));
                            $('#edit_topic_lydo').prop('checked', activity.topics.includes(
                                'LYDO'));
                            $('#edit_topic_lydc').prop('checked', activity.topics.includes(
                                'LYDC'));
                            $('#edit_topic_yorp').prop('checked', activity.topics.includes(
                                'YORP'));
                            $('#edit_topic_asrh').prop('checked', activity.topics.includes(
                                'ASRH'));

                            // Specific Objectives and Outputs
                            $('#edit_specific_objectives').val(activity.specific_objectives);
                            $('#edit_specific_outputs').val(activity.specific_outputs);

                            $('#edit_others_audience').val(activity.others);
                            $('#edit_others_equipment').val(activity.others_equipment);

                            // Equipment Available
                            $('#edit_equipment_projector').prop('checked', activity.equipment
                                .includes('Projector'));
                            $('#edit_equipment_speaker').prop('checked', activity.equipment
                                .includes('Speaker'));
                            $('#edit_equipment_microphone').prop('checked', activity.equipment
                                .includes('Microphone'));
                            $('#edit_equipment_clicker').prop('checked', activity.equipment
                                .includes('Clicker'));
                            $('#edit_equipment_podium').prop('checked', activity.equipment
                                .includes('Podium'));
                            $('#edit_equipment_led_screen').prop('checked', activity.equipment
                                .includes('LED Screen'));
                            $('#edit_equipment_video_conference').prop('checked', activity
                                .equipment.includes('Video conference application'));

                            $('#update-form').attr('action', '/activity-request/' + activityId);
                        });
                });

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/activity-request/' + $(this).data(
                        'activity'));
                });

                $('.acceptBtn').click(function() {
                    $('#accept-form').attr('action', '/accept-activity/' + $(this).data(
                        'activity'));
                })

                $('.rejectBtn').click(function() {
                    $('#reject-form').attr('action', '/reject-activity/' + $(this).data(
                        'activity'));
                })

                $('.doneBtn').click(function() {
                    $('#done-form').attr('action', '/done-activity/' + $(this).data(
                        'activity'));
                })

                $('.cancelBtn').click(function() {
                    $('#cancel-form').attr('action', '/cancel-activity/' + $(this).data(
                        'activity'));
                })

                $('.reviewBtn').click(function() {
                    fetch('/activity-request/' + $(this).data('activity'))
                        .then(response => response.json())
                        .then(activity => {
                            $('#view-reason').val(activity.reason);
                        });
                })

            })
        });
    </script>
@endpush
