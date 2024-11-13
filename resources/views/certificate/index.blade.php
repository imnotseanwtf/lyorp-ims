@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Certificate</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Certificate') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    @admin
                        <button class="main-btn btn-secondary btn-hover" data-bs-target="#editModal" data-bs-toggle="modal">
                            Edit Certificate Logo or Signiture
                        </button>
                        <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                            Create Certificate
                        </button>
                    @endadmin
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

    {{-- DELETE certificate --}}
    @include('certificate.modals.delete')

    @include('certificate.modals.edit')
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
