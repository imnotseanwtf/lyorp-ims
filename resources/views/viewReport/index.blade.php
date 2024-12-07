@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reports</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Reports') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    {{-- VIEW REPORT --}}
    @include('admin-report.modals.view')

    @include('admin-report.modals.accept')

    @include('admin-report.modals.reject')
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
            const tableInstance = window.LaravelDataTables['viewReport_dataTable'] = $('#viewReport_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/user-report/' + $(this).data('report'))
                        .then(response => response.json())
                        .then(report => {
                            $('#view_title').val(report.title);

                            if (!report.reason) { // Check if reason is null or empty
                                $('#reason_form_group').hide();
                            } else {
                                $('#view_reason').val(report.reason);
                            }

                            $('#view_content').val(report.content);
                            $('#view_seminars_activities_conducted').val(report
                                .seminars_and_activities_conducted || 'N/A');
                            $('#view_seminars_activities_attended').val(report
                                .seminars_and_activities_attended || 'N/A');
                            $('#view_recruitment').val(report.recruitment || 'N/A');
                            $('#view_meeting_conducted').val(report.meeting_conducted || 'N/A');
                            $('#view_others').val(report.others || 'N/A');

                            function setLinkOrMessage(fileKey, linkId, inputId) {
                                const fileName = report[fileKey];
                                if (fileName) {
                                    const date = new Date();
                                    const formattedDate = date.toISOString().split('T')[0];
                                    const newFileName = `Reports_${formattedDate}`; // Added date to filename
                                    $(`#${linkId}`)
                                        .attr('href', '/storage/' + fileName)
                                        .attr('download', newFileName)
                                        .show();
                                    $(`#${inputId}`).show();
                                } else {
                                    $(`#${linkId}`).hide();
                                    $(`#${inputId}`).val('No file').show();
                                }
                            }

                            setLinkOrMessage('file', 'link_file', 'view_file');
                        });
                });

                $('.activateBtn').click(function() {
                    $('#activate-form').attr('action', '/accept-view/' + $(this).data(
                    'report'));
                })

                $('.rejectBtn').click(function() {
                    $('#reject-form').attr('action', '/reject-view/' + $(this).data('report'));
                })
            }) 
        });
    </script>
@endpush
