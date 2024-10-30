<div class="d-flex justify-content-around">
    <!-- View report button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-report="{{ $report->id }}" title="View Report">
        <i class="fa-solid fa-eye"></i>
    </button>

    <!-- Edit report button with tooltip -->
    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-report="{{ $report->id }}" title="Edit Report">
        <i class="fa-solid fa-pen"></i>
    </button>

    <!-- Delete report button with tooltip -->
    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-report="{{ $report->id }}" title="Delete Report">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>