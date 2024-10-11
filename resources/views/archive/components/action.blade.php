<div class="d-flex justify-content-around">

    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-report="{{ $report->id }}">
        <i class="fa-solid fa-eye"></i>
    </button>

    @organization
        <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
            data-report="{{ $report->id }}">
            <i class="fa-solid fa-trash"></i>
        </button>
    @endorganization

</div>
