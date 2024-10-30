@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('folder.index') }}">Folders</a></li>
            @admin
                <li class="breadcrumb-item"><a href="{{ route('admin-report.index', $folderId) }}">Reports</a></li>
            @endadmin
            @organization
                <li class="breadcrumb-item"><a href="{{ route('user-report.index', $folderId) }}">Reports</a></li>
            @endorganization
            <li class="breadcrumb-item active" aria-current="page">Archive</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Archive') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    {{-- VIEW Archive --}}
    @include('archive.modals.view')

    {{-- DELETE Archive --}}
    @include('archive.modals.delete')

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
            const tableInstance = window.LaravelDataTables['archiveReport_dataTable'] = $(
                    '#archiveReport_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/archive/' + $(this).data('report'))
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

                $('.deleteBtn').click(function() {
                    console.log($(this).data('report'));
                    $('#delete-form').attr('action', '/user-report/' + $(this).data('report'));
                });

            })
        });
    </script>
@endpush
