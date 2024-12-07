<div class="d-flex justify-content-around">
    <!-- View activity button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-activity="{{ $activity->id }}" title="Additional Information">
        <i class="fa-solid fa-eye"></i>
    </button>


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


    @if ($activity->status == 1)
        <a href="{{ route('registered.index', $activity->id) }}" class="btn btn-primary" title="View Registered">
            <i class="fa-solid fa-user"></i>
        </a>
    @endif
</div>
