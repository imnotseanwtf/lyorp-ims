@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
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
                    <a href="{{ route('activity-request.index', 1) }}" class="main-btn btn-info btn-hover">Accepted</a>
                    <a href="{{ route('activity-request.index', 2) }}" class="main-btn btn-danger btn-hover">Rejected</a>
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

                            // Topics to be Discussed
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

                            $('#view_specific_objectives').val(activity.specific_objectives);
                            $('#view_specific_outputs').val(activity.specific_outputs);

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

                            // File Download Link
                            function setLinkOrMessage(fileKey, linkId, inputId) {
                                const fileName = activity[fileKey];
                                if (fileName) {
                                    $(`#${linkId}`).attr('href', '/storage/' + fileName).show();
                                    $(`#${inputId}`).val(fileName);
                                    $(`#${inputId}`).show();
                                } else {
                                    $(`#${linkId}`).hide();
                                    $(`#${inputId}`).val('No file').show();
                                }
                            }
                            setLinkOrMessage('file', 'link_file', 'view_file');
                        });
                });


                $('.editBtn').click(function() {
                    const activityId = $(this).data('activity');
                    fetch('/activity-request/' + activityId)
                        .then(response => response.json())
                        .then(activity => {
                            // General Information
                            $('#edit_activity_name').val(activity.activity_name);
                            $('#edit_date').val(activity.date);
                            $('#edit_venue').val(activity.venue);
                            $('#edit_time').val(activity.time);

                            // Topics to be Discussed
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

                            // Set form action to update route
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

            })
        });
    </script>
@endpush
