<div class="d-flex justify-content-around">
    <!-- View activity button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-activity="{{ $activity->id }}" title="Additional Information">
        <i class="fa-solid fa-eye"></i>
    </button>

    @organization
        @if (!$activity->status)
            <!-- Edit activity button with tooltip -->
            <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
                data-activity="{{ $activity->id }}" title="Edit Activity">
                <i class="fa-solid fa-pen"></i>
            </button>
        @endif
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
        @if (!$activity->status)
            <!-- Edit activity button with tooltip -->
            <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-activity="{{ $activity->id }}" title="Delete Activity">
                <i class="fa-solid fa-trash"></i>
            </button>
        @endif
        @if ($activity->status == 2)
            <button class="btn btn-danger reviewBtn" data-bs-toggle="modal" data-bs-target="#reviewModal"
                data-activity="{{ $activity->id }}" title="Rejected Reason">
                <i class="fa-solid fa-eye"></i>
            </button>
        @endif
    @endorganization
    @if ($activity->status == 1)
        <a href="{{ route('registered.index', $activity->id) }}" class="btn btn-primary" title="View Registered">
            <i class="fa-solid fa-user"></i>
        </a>

        @organization
            @if ($activity->activity_status == 1)
                <!-- Accept activity button with tooltip -->
                <button class="btn btn-success doneBtn" data-bs-toggle="modal" data-bs-target="#doneModal"
                    data-activity="{{ $activity->id }}" title="Done Activity">
                    <i class="fa-solid fa-check"></i>
                </button>

                <!-- Reject activity button with tooltip -->
                <button class="btn btn-danger cancelBtn" data-bs-toggle="modal" data-bs-target="#cancelModal"
                    data-activity="{{ $activity->id }}" title="Cancel Activity">
                    <i class="fa-solid fa-times"></i>
                </button>
            @endif
        @endorganization

    @endif
</div>
