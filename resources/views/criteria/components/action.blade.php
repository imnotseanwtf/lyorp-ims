<div class="d-flex justify-content-around">

    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-criteria="{{ $criteria->id }}">
        <i class="fa-solid fa-pen"></i>
    </button>

    <a href="{{ route('question.index', $criteria->id) }}" class="btn btn-info">
        <i class="fa-solid fa-eye"></i>
    </a>

    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-criteria="{{ $criteria->id }}">
        <i class="fa-solid fa-trash"></i>
    </button>

    <a href="{{ route('review.index', $criteria->id) }}" class="btn btn-success">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

</div>
