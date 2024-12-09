<div class="d-flex justify-content-around">
    <!-- View questions button with tooltip -->
    <a href="{{ route('question.index', $criteria->id) }}" class="btn btn-info" title="View Questions">
        <i class="fa-solid fa-eye"></i>
    </a>

    <!-- Edit criteria button with tooltip -->
    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-criteria="{{ $criteria->id }}" title="Edit Name">
        <i class="fa-solid fa-pen"></i>
    </button>

    <!-- Assign answer button with tooltip -->
    <a href="{{ route('assign-answer.index', $criteria->id) }}" class="btn btn-success" title="Assign Answer">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

    <!-- Delete criteria button with tooltip -->
    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-criteria="{{ $criteria->id }}" title="Delete Criteria">
        <i class="fa-solid fa-trash"></i>
    </button>
    
</div>
