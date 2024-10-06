@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Users') }}</h2>
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
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['user_dataTable'] = $('#user_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    const userId = $(this).data('user');
                    fetch('/users/' + userId)
                        .then(response => response.json())
                        .then(user => {
                            console.log(user); // Log the fetched user data

                            // Set download links for each file with '/storage/' prepended
                            $('#link_duty_accomplished_registration_form').attr('href',
                                '/storage/' + user.duty_accomplished_registration_form);
                            $('#link_list_of_officers_and_adviser').attr('href', '/storage/' +
                                user.list_of_officers_and_adviser);
                            $('#link_list_of_member_in_good_standing').attr('href',
                                '/storage/' + user.list_of_member_in_good_standing);
                            $('#link_constitution_and_by_laws').attr('href', '/storage/' + user
                                .constitution_and_by_laws);
                            $('#link_endorsement_certification').attr('href', '/storage/' + user
                                .endorsement_certification_from_proper_authority);

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
            })
        })
    </script>
@endpush
