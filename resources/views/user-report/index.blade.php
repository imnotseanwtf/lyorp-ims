@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Reports') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Create Report
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


    {{-- CREATE REPORT --}}
    @include('user-report.modals.create')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['userReport_dataTable'] = $('#userReport_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/user-report/' + $(this).data('report'))
                        .then(response => response.json())
                        .then(report => {
                            $('#view_name').val(report.name);
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/user-report/' + $(this).data('report'))
                        .then(response => response.json())
                        .then(report => {
                            $('#edit_name').val(report.name);
                            $('#update-form').attr('action', '/user-report/' + $(this).data(
                                'report'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/user-report/' + $(this).data('report'));
                });

            })
        });
    </script>
@endpush
