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
            <li class="breadcrumb-item"><a href="{{ route('activity-request.index') }}">Technical Assistant</a></li>
            <li class="breadcrumb-item active" aria-current="page">Progress Report</li>
        </ol>
    </nav>


    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Progress Report') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                @if (!$activity->status == 3)
                    @organization
                        <div class="title mb-30 text-end">
                            <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                                Create Progress Report
                            </button>
                        </div>
                    @endorganization
                @endif
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    @include('progress.modals.create')
    @include('progress.modals.view')
    @include('progress.modals.edit')
    @include('progress.modals.delete')
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
            const tableInstance = window.LaravelDataTables['progressUpdate_dataTable'] = $(
                    '#progressUpdate_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/progress/' + $(this).data('progress'))
                        .then(response => response.json())
                        .then(progress => {
                            $('#view_title').val(progress.title);
                            $('#view_progress_update').val(progress.progress_update);

                            function setLinkOrMessage(fileKey, linkId, inputId) {
                                const fileName = progress[
                                    fileKey]; // Changed from 'report' to 'progress'
                                if (fileName) {
                                    const date = new Date(progress
                                        .created_at); // Changed from 'report' to 'progress'
                                    const formattedDate = date.toISOString().split('T')[0];
                                    const newFileName =
                                        `ProgressUpdate_${formattedDate}`; // Added date to filename
                                    $(`#${linkId}`)
                                        .attr('href', `/storage/${fileName}`)
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
                })

                $('.editBtn').click(function() {
                    fetch('/progress/' + $(this).data('progress'))
                        .then(response => response.json())
                        .then(progress => {
                            $('#edit_title').val(progress.title);
                            $('#edit_progress_update').val(progress.progress_update);
                            $('#update-form').attr('action', '/progress/' + $(this).data(
                                'progress'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/progress/' + $(this).data('progress'));
                });

            })
        });
    </script>
@endpush
