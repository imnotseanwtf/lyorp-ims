@extends('layouts.app')

@section('content')
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
                        @foreach ($evaluationAnswers as $index => $evaluationAnswer)
                            <div class="row my-3">
                                <div class="col">
                                    <p><strong>Question {{ $index + 1 }}:
                                        </strong>{{ $evaluationAnswer->question->question }}</p>
                                    <p><strong>Answer: </strong>{{ $evaluationAnswer->answer }}</p>
                                    <div class="d-flex justify-content-between">
                                        @foreach (App\Enums\RatingLegendsEnum::cases() as $item)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="ratings[{{ $evaluationAnswer->question->id }}]"
                                                    id="rating-{{ $evaluationAnswer->question->id }}-{{ $item->value }}"
                                                    value="{{ $item->value }}"
                                                    @if ($evaluationAnswer->answer == $item->value) checked @endif disabled>
                                                <!-- Disabled attribute to make it non-selectable -->
                                                <label class="form-check-label"
                                                    for="rating-{{ $evaluationAnswer->question->id }}-{{ $item->value }}">
                                                    {{ $item->value }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
