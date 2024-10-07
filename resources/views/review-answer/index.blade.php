@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Review Answers') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    <button class="main-btn btn-primary btn-hover" data-bs-target="#assignToAnswerModal"
                        data-bs-toggle="modal">
                        Add User
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

    {{-- ASSIGN TO ANSWER --}}
    @include('review-answer.modals.assignToAnswer')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['reviewAnswers_dataTable'] = $(
                    '#reviewAnswers_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/review/' + $(this).data('review'));
                });
                
            })
        });
    </script>
@endpush
