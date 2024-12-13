<div class="d-flex justify-content-around">

    <button type="button" class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-progress="{{ $progress->id }}" title="View Progress Update">
        <i class="fa-solid fa-eye"></i>
    </button>

    @organization
        <!-- Edit progress button with tooltip -->
        <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
            data-progress="{{ $progress->id }}" title="Edit Progress Update">
            <i class="fa-solid fa-pen"></i>
        </button>

        <!-- Delete progress button with tooltip -->
        <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
            data-progress="{{ $progress->id }}" title="Delete Progress Update">
            <i class="fa-solid fa-trash"></i>
        </button>
    @endorganization

</div>
