@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Reports') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['adminReport_dataTable'] = $('#adminReport_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/admin-report/' + $(this).data('report'))
                        .then(response => response.json())
                        .then(report => {
                            $('#view_name').val(report.name);
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/admin-report/' + $(this).data('report'))
                        .then(response => response.json())
                        .then(report => {
                            $('#edit_name').val(report.name);
                            $('#update-form').attr('action', '/admin-report/' + $(this).data(
                                'report'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/admin-report/' + $(this).data('report'));
                });

            })
        });
    </script>
@endpush
