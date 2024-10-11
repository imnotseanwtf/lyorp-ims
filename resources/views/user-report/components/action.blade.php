<div class="d-flex justify-content-around">

    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-report="{{ $report->id }}">
        <i class="fa-solid fa-pen"></i>
    </button>

    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-report="{{ $report->id }}">
        <i class="fa-solid fa-eye"></i>
    </button>

    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-report="{{ $report->id }}">
        <i class="fa-solid fa-trash"></i>
    </button>

</div>
