@extends('layouts.app')

@section('content')
    @forelse ($assign as $assignment)
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

                            <!-- Check if the assignment has already been answered -->
                            @if ($assignment->is_answered)
                                <div class="alert alert-info" role="alert">
                                    Already Answered
                                </div>
                            @else
                                <!-- Form for rating submission -->
                                <form action="{{ route('evaluation.store') }}" method="POST">
                                    @csrf <!-- CSRF token for protection -->

                                    <input type="hidden" value="{{ $assignment->id }}" name="assign_id">
                                    <input type="hidden" value="{{ $assignment->criteria->id }}" name="criteria_id">

                                    @foreach ($assignment->criteria->questions as $index => $question)
                                        <div class="row my-3">
                                            <div class="col">
                                                <p><strong>Question {{ $index + 1 }}: </strong>{{ $question->question }}</p>
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
                                    @endforeach

                                    <!-- Submit button for the form -->
                                    <div class="row mt-4">
                                        <div class="col text-end">
                                            <button type="submit" class="btn btn-primary">Submit Ratings</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div>No Evaluation Form Yet.</div>
    @endforelse
@endsection
