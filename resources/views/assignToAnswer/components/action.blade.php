<div class="d-flex justify-content-around">
    @if ($assign->is_answered == true)
        <!-- View answered assignment button with tooltip -->
        <a href="{{ route('answered', $assign->id) }}" class="btn btn-info" title="View Answered Assignment">
            <i class="fa-solid fa-eye"></i>
        </a>
    @endif

    <!-- Delete assignment button with tooltip -->
    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-assign="{{ $assign->id }}" title="Delete Assignment">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>
