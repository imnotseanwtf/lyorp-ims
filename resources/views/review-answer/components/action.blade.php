<div class="d-flex justify-content-around">

    @if ($evaluationAssignToAnswer->is_answered == true)
        <a href="{{ route('answer', $evaluationAssignToAnswer->id) }}" class="btn btn-info">
            <i class="fa-solid fa-eye"></i>
        </a>
    @endif

    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-evaluationAssignToAnswer="{{ $evaluationAssignToAnswer->id }}">
        <i class="fa-solid fa-trash"></i>
    </button>


</div>
