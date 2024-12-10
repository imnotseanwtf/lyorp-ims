@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('activity-request.index') }}">Technical Assistance</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $activityRequest->activity_name }}</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Register Participant') }}</h2>
                </div>
            </div>
            @organization
                @if ($showCreate)
                    <div class="col-md-6">
                        <div class="title mb-30 text-end">
                            <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                                Create Register Participant
                            </button>
                        </div>
                    </div>
                @endif
            @endorganization
        </div>
    </div>

    <div class="card">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    @include('registeredParticipant.modals.create')

    @include('registeredParticipant.modals.view')

    @include('registeredParticipant.modals.edit')

    @include('registeredParticipant.modals.delete')
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
            const tableInstance = window.LaravelDataTables['registeredParticipant_dataTable'] = $(
                    '#registeredParticipant_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {
                $('.viewBtn').click(function() {
                    fetch('/registered/' + $(this).data('registered'))
                        .then(response => response.json())
                        .then(registered => {
                            $('#view_name').val(registered.name);
                            $('#view_age').val(registered.age);
                            $('#view_gender').val(registered.gender);
                            $('#view_barangay').val(registered.barangay);
                            $('#view_name_of_organization').val(registered
                                .name_of_organization);
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/registered/' + $(this).data('registered'))
                        .then(response => response.json())
                        .then(registered => {
                            $('#edit_name').val(registered.name);
                            $('#edit_age').val(registered.age);
                            $('#edit_gender').val(registered.gender);
                            $('#edit_barangay').val(registered.barangay);
                            $('#edit_name_of_organization').val(registered
                                .name_of_organization);
                            $('#update-form').attr('action', '/registered/' + $(this).data(
                                'registered'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/registered/' + $(this).data('registered'));
                });

            })
        });
    </script>
@endpush
