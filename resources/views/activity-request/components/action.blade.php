<div class="d-flex justify-content-around">
    <!-- View activity button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-activity="{{ $activity->id }}" title="Additional Information">
        <i class="fa-solid fa-eye"></i>
    </button>

    @organization
        <!-- Edit activity button with tooltip -->
        <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
            data-activity="{{ $activity->id }}" title="Edit Activity">
            <i class="fa-solid fa-pen"></i>
        </button>
    @endorganization

    @admin
        @if (!$activity->status)
            <!-- Accept activity button with tooltip -->
            <button class="btn btn-success acceptBtn" data-bs-toggle="modal" data-bs-target="#acceptModal"
                data-activity="{{ $activity->id }}" title="Accept Activity">
                <i class="fa-solid fa-check"></i>
            </button>

            <!-- Reject activity button with tooltip -->
            <button class="btn btn-danger rejectBtn" data-bs-toggle="modal" data-bs-target="#rejectModal"
                data-activity="{{ $activity->id }}" title="Reject Activity">
                <i class="fa-solid fa-times"></i>
            </button>
        @endif
    @endadmin

    @organization
        <!-- Delete activity button with tooltip -->
        <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
            data-activity="{{ $activity->id }}" title="Delete Activity">
            <i class="fa-solid fa-trash"></i>
        </button>
        @if ($activity->reason)
            <button class="btn btn-danger reviewBtn" data-bs-toggle="modal" data-bs-target="#reviewModal"
                data-activity="{{ $activity->id }}" title="Rejected Reason">
                <i class="fa-solid fa-eye"></i>
            </button>
        @endif
    @endorganization
</div>
