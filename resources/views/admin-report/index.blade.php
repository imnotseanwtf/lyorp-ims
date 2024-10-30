@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
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
                <div class="title mb-30 text-end">
                    <a href="{{ route('archive.index', $folderId) }}" class="main-btn btn-danger btn-hover">
                        Archive
                    </a>
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
                    fetch('/admin-report/' + $(this).data('report'))
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
            })
        });
    </script>
@endpush
