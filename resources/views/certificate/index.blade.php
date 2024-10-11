@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Certificate') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Create Certificate
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

    {{-- CREATE certificate --}}
    @include('certificate.modals.create')

    {{-- EDIT certificate --}}
    @include('certificate.modals.edit')

    {{-- VIEW certificate --}}
    @include('certificate.modals.view')

    {{-- DELETE certificate --}}
    @include('certificate.modals.delete')

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['certificate_dataTable'] = $('#certificate_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/certificate/' + $(this).data('certificate'))
                        .then(response => response.json())
                        .then(certificate => {
                            $('#view_name').val(certificate.name);
                            
                            function setLinkOrMessage(fileKey, linkId, inputId) {
                                const fileName = certificate[fileKey];
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
                    fetch('/certificate/' + $(this).data('certificate'))
                        .then(response => response.json())
                        .then(certificate => {
                            $('#edit_name').val(certificate.name);
                            $('#update-form').attr('action', '/certificate/' + $(this).data(
                                'certificate'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/certificate/' + $(this).data('certificate'));
                });

            })
        });
    </script>
@endpush
