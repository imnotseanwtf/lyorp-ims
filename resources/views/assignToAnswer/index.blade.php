@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('criteria.index') }}">Criteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Review Answers</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Review Answers') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    @admin
                        <button class="main-btn btn-primary btn-hover" data-bs-target="#assignToAnswerModal"
                            data-bs-toggle="modal">
                            Add User
                        </button>
                    @endadmin

                    @organization
                        <button class="main-btn btn-primary btn-hover" data-bs-target="#addAdminModal" data-bs-toggle="modal">
                            Add Admin
                        </button>
                    @endorganization
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    {{-- ASSIGN TO ANSWER MODAL --}}
    @include('assignToAnswer.modals.assignToAnswer')

    {{-- DELETE MODAL --}}
    @include('assignToAnswer.modals.delete')

    {{-- ADD ADMIN MODAL --}}
    @include('assignToAnswer.modals.addAdmin')
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
            const tableInstance = window.LaravelDataTables['assignToAnswer_dataTable'] = $(
                    '#assignToAnswer_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/assign-answer/' + $(this).data('assign'));
                });
            })
        });
    </script>
@endpush
