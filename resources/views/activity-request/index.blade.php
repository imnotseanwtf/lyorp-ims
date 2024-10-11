@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Activity Request') }}</h2>
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
        $(() => {
            const tableInstance = window.LaravelDataTables['activityRequest_dataTable'] = $(
                    '#activityRequest_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/activity-request/' + $(this).data('activity'))
                        .then(response => response.json())
                        .then(activity => {
                            $('#view_title').val(activity.title);
                            $('#view_content').val(activity.content);

                            function setLinkOrMessage(fileKey, linkId, inputId) {
                                const fileName = activity[fileKey];
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
                    fetch('/activity-request/' + $(this).data('activity'))
                        .then(response => response.json())
                        .then(activity => {
                            $('#edit_title').val(activity.title);
                            $('#edit_content').val(activity.content);
                            $('#update-form').attr('action', '/activity-request/' + $(this)
                                .data(
                                    'activity'));
                        });
                })

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
