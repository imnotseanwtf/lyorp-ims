@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('criteria.index') }}">Criteria</a></li>
            <li class="breadcrumb-item"><a href="{{ route('assign-answer.index', $assign->criteria->id) }}">Review Answers</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Answer</li>
        </ol>
    </nav>

    <div class="card mt-3">
        <div class="card-header">
            <h3>{{ $assign->user->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="card-header">
                        <div class="row text-center">
                            <h4>{{ $assign->criteria->name }}</h4>
                        </div>
                        @foreach ($answers as $index => $answer)
                            <div class="row my-3">
                                <div class="col">
                                    <p><strong>Question {{ $index + 1 }}:</strong> {{ $answer->question->question }}</p>
                                    <p><strong>Answer: </strong>{{ $answer->answer }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- New table -->
                    <table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th>Rating</th>
                                <th>Tally</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($totals as $total)
                                @foreach ($ratings as $rating)
                                    <tr>
                                        <td>{{ $rating }}</td>
                                        <td>{{ $total['tally'][$rating] }}</td>
                                        <td>{{ $total['percentages'][$rating] }}%</td>
                                    </tr>
                                @endforeach
                            @endforeach

                            <tr>
                                <td><strong>Total Questions</strong></td>
                                <td colspan="2">{{ $totalQuestions }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
