<div class="d-flex justify-content-around">
    <!-- View registered button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-registered="{{ $registered->id }}" title="View Registered Participant">
        <i class="fa-solid fa-eye"></i>
    </button>
    
    @organization
        <!-- Edit registered button with tooltip -->
        <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
            data-registered="{{ $registered->id }}" title="Edit Registered Participant">
            <i class="fa-solid fa-pen"></i>
        </button>

        <!-- Delete registered button with tooltip -->
        <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
            data-registered="{{ $registered->id }}" title="Delete registered">
            <i class="fa-solid fa-trash"></i>
        </button>
    @endorganization
</div>
