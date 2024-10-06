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

    <button class="btn btn-success assignToAnswerBtn" data-bs-toggle="modal" data-bs-target="#assignToAnswerModal"
        data-criteria="{{ $criteria->id }}">
        <i class="fa-solid fa-plus"></i>
    </button>

</div>
