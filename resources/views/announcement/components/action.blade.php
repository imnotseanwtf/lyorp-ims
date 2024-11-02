<div class="d-flex justify-content-around">
    <!-- View announcement button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-announcement="{{ $announcement->id }}" title="Additional Information">
        <i class="fa-solid fa-eye"></i>
    </button>

    <!-- Edit announcement button with tooltip -->
    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-announcement="{{ $announcement->id }}" title="Edit Announcement">
        <i class="fa-solid fa-pen"></i>
    </button>

    <!-- Delete announcement button with tooltip -->
    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-announcement="{{ $announcement->id }}" title="Delete Announcement">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>