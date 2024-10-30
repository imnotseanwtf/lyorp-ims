@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Critera</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Critera') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    <a href="{{ route('evaluation.index') }}" class="main-btn btn-info btn-hover">Pending Evaluation</a>
                    <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Create Criteria
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

    {{-- CREATE CRITERIA --}}
    @include('criteria.modals.create')

    {{-- EDIT CRITERIA --}}
    @include('criteria.modals.edit')

    {{-- VIEW CRITERIA --}}
    @include('criteria.modals.view')

    {{-- DELETE CRITERIA --}}
    @include('criteria.modals.delete')
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
            const tableInstance = window.LaravelDataTables['criteria_dataTable'] = $('#criteria_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/criteria/' + $(this).data('criteria'))
                        .then(response => response.json())
                        .then(criteria => {
                            $('#view_name').val(criteria.name);
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/criteria/' + $(this).data('criteria'))
                        .then(response => response.json())
                        .then(criteria => {
                            $('#edit_name').val(criteria.name);
                            $('#update-form').attr('action', '/criteria/' + $(this).data(
                                'criteria'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/criteria/' + $(this).data('criteria'));
                });

            })
        });
    </script>
@endpush
