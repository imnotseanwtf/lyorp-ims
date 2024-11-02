@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Annoucement</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Announcement') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Create Announcement
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

    {{-- CREATE announcement --}}
    @include('announcement.modals.create')

    {{-- EDIT announcement --}}
    @include('announcement.modals.edit')

    {{-- VIEW announcement --}}
    @include('announcement.modals.view')

    {{-- DELETE announcement --}}
    @include('announcement.modals.delete')
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
            const tableInstance = window.LaravelDataTables['announcement_dataTable'] = $('#announcement_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/announcement/' + $(this).data('announcement'))
                        .then(response => response.json())
                        .then(announcement => {
                            $('#view_title').val(announcement.title);
                            $('#view_description').val(announcement.description);
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/announcement/' + $(this).data('announcement'))
                        .then(response => response.json())
                        .then(announcement => {
                            $('#edit_title').val(announcement.title);
                            $('#edit_description').val(announcement.description);
                            $('#update-form').attr('action', '/announcement/' + $(this).data(
                                'announcement'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/announcement/' + $(this).data(
                        'announcement'));
                });

            })
        });
    </script>
@endpush
