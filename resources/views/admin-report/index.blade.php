@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('folder.index') }}">Folders</a></li>
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
            <div class="col-md-6">
                <div class="dropdown text-end">
                    <button class="main-btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" style="width: 200px;">
                        Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"
                                href="{{ route('admin-report.index', ['folder_id' => $folder_id]) }}">All</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('admin-report.index', ['folder_id' => $folder_id, 'status' => 0]) }}">Pending</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="{{ route('admin-report.index', ['folder_id' => $folder_id, 'status' => 1]) }}">Accepted</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="{{ route('admin-report.index', ['folder_id' => $folder_id, 'status' => 2]) }}">Rejected</a>
                        </li>
                    </ul>
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
            const tableInstance = window.LaravelDataTables['adminReport_dataTable'] = $('#adminReport_dataTable')
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
                                    const newFileName =
                                    `Reports`; // Set your desired file name here
                                    $(`#${linkId}`)
                                        .attr('href', '/storage/' + fileName)
                                        .attr('download',
                                        newFileName) // Set the download attribute
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
                    $('#activate-form').attr('action', '/activate-report/' + $(this).data(
                    'report'));
                })

                $('.rejectBtn').click(function() {
                    $('#reject-form').attr('action', '/reject-report/' + $(this).data('report'));
                })
            })
        });
    </script>
@endpush
