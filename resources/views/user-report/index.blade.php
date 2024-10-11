@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Reports') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    <a href="{{ route('archive.index') }}" class="main-btn btn-danger btn-hover">
                        Archive
                    </a>
                    <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Create Report
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    {{-- CREATE REPORT --}}
    @include('user-report.modals.create')

    {{-- VIEW REPORT --}}
    @include('user-report.modals.view')

    {{-- EDIT REPORT --}}
    @include('user-report.modals.edit')

    {{-- DELETE REPORT --}}
    @include('user-report.modals.delete')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['userReport_dataTable'] = $('#userReport_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/user-report/' + $(this).data('report'))
                        .then(response => response.json())
                        .then(report => {
                            $('#view_title').val(report.title);
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
                                    $(`#${linkId}`).attr('href', '/storage/' + fileName).show();
                                    $(`#${inputId}`).show();
                                } else {
                                    $(`#${linkId}`).hide();
                                    $(`#${inputId}`).val('No file').show();
                                }
                            }

                            setLinkOrMessage('file', 'link_file', 'view_file');
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/user-report/' + $(this).data('report'))
                        .then(response => response.json())
                        .then(report => {
                            $('#edit_title').val(report.title);
                            $('#edit_content').val(report.content);
                            $('#edit_seminars_activities_conducted').val(report
                                .seminars_and_activities_conducted);
                            $('#edit_seminars_activities_attended').val(report
                                .seminars_and_activities_attended);
                            $('#edit_recruitment').val(report.recruitment);
                            $('#edit_meeting_conducted').val(report.meeting_conducted);
                            $('#edit_others').val(report.others);
                            $('#update-form').attr('action', '/user-report/' + $(this).data(
                                'report'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/soft-delete/' + $(this).data('report'));
                });

            })
        });
    </script>
@endpush
