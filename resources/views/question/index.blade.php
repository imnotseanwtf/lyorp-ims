@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('criteria.index') }}">Criteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Questions</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ $criteriaName }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Create Question
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

    {{-- CREATE QUESTION --}}
    @include('question.modals.create')

    {{-- EDIT QUESTION --}}
    @include('question.modals.edit')

    {{-- VIEW QUESTION --}}
    @include('question.modals.view')

    {{-- DELETE QUESTION --}}
    @include('question.modals.delete')
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
            const tableInstance = window.LaravelDataTables['question_dataTable'] = $('#question_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/question/' + $(this).data('question'))
                        .then(response => response.json())
                        .then(question => {
                            $('#view_question').val(question.question);
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/question/' + $(this).data('question'))
                        .then(response => response.json())
                        .then(question => {
                            $('#edit_question').val(question.question);
                            $('#update-form').attr('action', '/question/' + $(this).data(
                                'question'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/question/' + $(this).data('question'));
                });

            })
        })
    </script>
@endpush
