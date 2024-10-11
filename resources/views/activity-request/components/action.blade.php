<div class="d-flex justify-content-around">
    @organization
        <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
            data-activity="{{ $activity->id }}">
            <i class="fa-solid fa-pen"></i>
        </button>
    @endorganization

    @admin
        <button class="btn btn-success acceptBtn" data-bs-toggle="modal" data-bs-target="#acceptModal"
            data-activity="{{ $activity->id }}">
            <i class="fa-solid fa-check"></i>
        </button>

        <button class="btn btn-danger rejectBtn" data-bs-toggle="modal" data-bs-target="#rejectModal"
            data-activity="{{ $activity->id }}">
            <i class="fa-solid fa-times"></i>
        </button>
    @endadmin

    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-activity="{{ $activity->id }}">
        <i class="fa-solid fa-eye"></i>
    </button>

    @organization
        <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
            data-activity="{{ $activity->id }}">
            <i class="fa-solid fa-trash"></i>
        </button>
    @endorganization
</div>
