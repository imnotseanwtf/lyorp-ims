<div class="d-flex justify-content-around">

    <button class="btn btn-success activateBtn" data-bs-toggle="modal" data-bs-target="#activateModal"
        data-user="{{ $user->id }}">
        <i class="fa-solid fa-check"></i>
    </button>

    <button class="btn btn-danger rejectBtn" data-bs-toggle="modal" data-bs-target="#rejectModal"
        data-user="{{ $user->id }}">
        <i class="fa-solid fa-times"></i>
    </button>

    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-user="{{ $user->id }}">
        <i class="fa-solid fa-eye"></i>
    </button>
    
</div>
