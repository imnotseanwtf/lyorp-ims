@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Organizations</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Organizations') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dropdown text-end">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false" style="width: 200px;">
                        Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('users.index') }}">All</a></li>
                        <li><a class="dropdown-item" href="{{ route('users.index', 0) }}">Pending</a></li>
                        <li><a class="dropdown-item" href="{{ route('users.index', 1) }}">Accepted</a></li>
                        <li><a class="dropdown-item" href="{{ route('users.index', 2) }}">Rejected</a></li>
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

    {{-- ACTIVATE --}}
    @include('users.modals.activate')

    {{-- REJECT --}}
    @include('users.modals.reject')

    {{-- VIEW --}}
    @include('users.modals.view')

    @include('users.modals.password')
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
            const tableInstance = window.LaravelDataTables['user_dataTable'] = $('#user_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    const userId = $(this).data('user');
                    fetch('/users/' + userId)
                        .then(response => response.json())
                        .then(user => {

                            function setLinkOrMessage(fileKey, linkId, inputId) {
                                const fileName = user[fileKey];
                                if (fileName) {
                                    $(`#${linkId}`).attr('href', '/storage/' + fileName).show();
                                    $(`#${inputId}`).val(fileName);
                                    $(`#${inputId}`).show();
                                } else {
                                    $(`#${linkId}`).hide();
                                    $(`#${inputId}`).val('No file').show();
                                }
                            }

                            // Set download links or show "No file" for each file
                            setLinkOrMessage('duty_accomplished_registration_form',
                                'link_duty_accomplished_registration_form',
                                'view_duty_accomplished_registration_form');
                            setLinkOrMessage('list_of_officers_and_adviser',
                                'link_list_of_officers_and_adviser',
                                'view_list_of_officers_and_adviser');
                            setLinkOrMessage('list_of_member_in_good_standing',
                                'link_list_of_member_in_good_standing',
                                'view_list_of_member_in_good_standing');
                            setLinkOrMessage('constitution_and_by_laws',
                                'link_constitution_and_by_laws',
                                'view_constitution_and_by_laws');
                            setLinkOrMessage('endorsement_certification_from_proper_authority',
                                'link_endorsement_certification',
                                'view_endorsement_certification');

                            // Show the modal
                            $('#viewModal').modal('show');
                        })
                        .catch(error => {
                            console.error('Error fetching user data:', error);
                        });
                });

                $('.activateBtn').click(function() {
                    $('#activate-form').attr('action', '/activate/' + $(this).data('user'));
                })

                $('.rejectBtn').click(function() {
                    $('#reject-form').attr('action', '/reject/' + $(this).data('user'));
                })

                $('.editBtn').click(function() {
                    $('#update-form').attr('action', '/org-password/' + $(this).data('user'));
                })
            })
        })
    </script>
@endpush
