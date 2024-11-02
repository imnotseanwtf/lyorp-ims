@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('criteria.index') }}">Critera</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pending Evaluation</li>
        </ol>
    </nav>

    @forelse ($assign as $assignment)
        @if (!$assignment->is_answered)
            <div class="card mt-3">
                <div class="card-header">
                    <h3>{{ $assignment->criteria->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Rating Legends with Radio Buttons -->
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="card-header">
                                <div class="row text-center">
                                    <h4>Rate Each Question</h4>
                                </div>

                                <!-- Form for rating submission -->
                                <form action="{{ route('evaluation.store') }}" method="POST">
                                    @csrf <!-- CSRF token for protection -->

                                    <input type="hidden" value="{{ $assignment->id }}" name="assign_id">

                                    @foreach ($assignment->criteria->questions as $index => $question)
                                        @if ($question->answer_type == 'Rating Legends')
                                            <div class="row my-3">
                                                <div class="col">
                                                    <p><strong>Question {{ $index + 1 }}:
                                                        </strong>{{ $question->question }}</p>
                                                    <div class="d-flex justify-content-between">
                                                        @foreach (App\Enums\RatingLegendsEnum::cases() as $item)
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ratings[{{ $question->id }}]"
                                                                    id="rating-{{ $question->id }}-{{ $item->value }}"
                                                                    value="{{ $item->value }}" required>
                                                                <label class="form-check-label"
                                                                    for="rating-{{ $question->id }}-{{ $item->value }}">
                                                                    {{ $item->value }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($question->answer_type == 'Likert Scales')
                                            <div class="row my-3">
                                                <div class="col">
                                                    <p><strong>Question {{ $index + 1 }}:
                                                        </strong>{{ $question->question }}</p>
                                                    <div class="d-flex justify-content-between">
                                                        @foreach (App\Enums\LikertScalesEnum::cases() as $item)
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ratings[{{ $question->id }}]"
                                                                    id="rating-{{ $question->id }}-{{ $item->value }}"
                                                                    value="{{ $item->value }}" required>
                                                                <label class="form-check-label"
                                                                    for="rating-{{ $question->id }}-{{ $item->value }}">
                                                                    {{ $item->value }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($question->answer_type == 'Yes Or No')
                                            <div class="row my-3">
                                                <div class="col">
                                                    <p><strong>Question {{ $index + 1 }}:
                                                        </strong>{{ $question->question }}</p>
                                                    <div class="d-flex gap-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="ratings[{{ $question->id }}]"
                                                                id="rating-{{ $question->id }}-yes" value="Yes"
                                                                required>
                                                            <label class="form-check-label"
                                                                for="rating-{{ $question->id }}-yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="ratings[{{ $question->id }}]"
                                                                id="rating-{{ $question->id }}-no" value="No" required>
                                                            <label class="form-check-label"
                                                                for="rating-{{ $question->id }}-no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($question->answer_type == 'Input')
                                            <div class="row my-3">
                                                <div class="col">
                                                    <p><strong>Question {{ $index + 1 }}:
                                                        </strong>{{ $question->question }}</p>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="ratings[{{ $question->id }}]" id="textarea-{{ $question->id }}" rows="3"
                                                            required placeholder="Enter your answer here..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                    <!-- Submit button for the form -->
                                    <div class="row mt-4">
                                        <div class="col text-end">
                                            <button type="submit" class="btn btn-primary">Submit Ratings</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @empty
        <div>No Evaluation Form Yet.</div>
    @endforelse

    @if (
        $assign->count() > 0 &&
            $assign->every(function ($assignment) {
                return $assignment->is_answered;
            }))
        <div>No Evaluation Form Yet.</div>
    @endif
@endsection
