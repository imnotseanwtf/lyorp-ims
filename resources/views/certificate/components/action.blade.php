<div class="d-flex justify-content-around">
    <!-- View PDF button with tooltip -->
    <a href="{{ route('pdf', $certificate->id) }}" class="btn btn-info" title="View PDF">
        <i class="fa-solid fa-eye"></i>
    </a>

    <!-- Delete certificate button with tooltip -->
    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-certificate="{{ $certificate->id }}" title="Delete Certificate">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>